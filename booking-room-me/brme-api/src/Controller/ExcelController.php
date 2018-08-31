<?php

namespace App\Controller;

use App\Entity\MediaObject;
use App\Entity\User;
use phpDocumentor\Reflection\Types\Null_;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Yectep\PhpSpreadsheetBundle\Factory;


class ExcelController extends Controller
{
    private $colName = ['A', 'B', 'C', 'D', 'E',
                        'F', 'G', 'H', 'I', 'J',
                        'K', 'L', 'M', 'N', 'O',
                        'P', 'Q', 'R', 'S', 'T',
                        'U', 'V', 'W', 'X', 'Y',
                        'Z'];

    public function parseExcel($id, LoggerInterface $logger,
                               UserPasswordEncoderInterface $encoder,
                               \Swift_Mailer $mailer,
                               \Twig_Environment $twig)
    {
        set_time_limit(600);
        $mediaObject = $this->getDoctrine()
            ->getRepository(MediaObject::class)
            ->find($id);
//        $readerXlsx  = $this->get('phpoffice.spreadsheet')->createReader('Xlsx');

        $spreadsheet = $this->get('phpspreadsheet')->createSpreadsheet(__DIR__.'/../../public/media/'.$mediaObject->getFilename());
//        $spread = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        list($emailCol, $firstnameCol, $lastnameCol, $typeCol, $bedRoomNumberCol,
            $firstRow, $lastRow) = $this->parseInfo($sheet, $logger);

        $entityManager = $this->getDoctrine()->getManager();
        $repo = $entityManager->getRepository(User::class);
//        $a = new User();
//        $a->getEmail()
        $users = $repo->findBy(['role' => null]);
        $temp = [];
        foreach ($users as $user) {
            $u=[];
            $u['id']=$user->getId();
            $u['email']=$user->getEmail();
            array_push($temp, $u);
        }
        $users=$temp;

        for ($i = $firstRow; $i<= $lastRow; $i++) {
            $email = trim($sheet->getCell($emailCol.$i)->getValue());
            $user = $repo->findOneBy(['email' => $email]);

            if ($user != null) {
                $found = false;
                foreach ($users as $k => $u) {
                    if ($u['email'] == $user->getEmail()){
                        $found = true;
                        $key = $k;
                        break;
                    }
                }

                if (!$found) {
                    $logger->error('user not found');
                } else {
                    $logger->info('user found : '.$user->getEmail());
                    unset($users[$key]);
                }

                if ($firstnameCol != null) {
                    $user->setFirstname(trim($sheet->getCell($firstnameCol.$i)->getValue()));
                }

                if ($lastnameCol != null) {
                    $user->setLastname(trim($sheet->getCell($lastnameCol.$i)->getValue()));
                }

                if ($typeCol != null) {
                    $user->setType(trim($sheet->getCell($typeCol.$i)->getValue()));
                }

                if ($bedRoomNumberCol != null) {
                    $user->setBedRoomNumber(trim($sheet->getCell($bedRoomNumberCol.$i)->getValue()));
                }

                $entityManager->flush();
            } else {
                $user = new User($email);

                if ($firstnameCol != null) {
                    $user->setFirstname(trim($sheet->getCell($firstnameCol.$i)->getValue()));
                }

                if ($lastnameCol != null) {
                    $user->setLastname(trim($sheet->getCell($lastnameCol.$i)->getValue()));
                }

                if ($typeCol != null) {
                    $user->setType(trim($sheet->getCell($typeCol.$i)->getValue()));
                }

                if ($bedRoomNumberCol != null) {
                    $user->setBedRoomNumber(trim($sheet->getCell($bedRoomNumberCol.$i)->getValue()));
                }

                $password = $this->randomPassword();

                $encoded = $encoder->encodePassword($user, $password);
                $user->setPassword($encoded);
                $user->setRole(null);



                try {
                    $message = (new \Swift_Message('Ouverture de votre compte de réservation des salles à la Me'))
                        ->setFrom('no-reply-me@example.com')
                        ->setTo('recipient@example.com')
                        ->setBody($twig->render('createUser.html.twig',
                            array('name' => $user->getFirstname().' '.$user->getLastname(), 'password' => $password))
                            , 'text/html');
                } catch (\Twig_Error_Loader $e) {
                    throw new HttpException(500);
                } catch (\Twig_Error_Runtime $e) {
                    throw new HttpException(500);
                } catch (\Twig_Error_Syntax $e) {
                    throw new HttpException(500);
                }

                $mailer->send($message);

                $entityManager->persist($user);

                $entityManager->flush();
            }
        }

        foreach ($users as $u) {
            $user = $repo->findOneBy(['id' => $u['id']]);
            $entityManager->remove($user);
        }
        $entityManager->flush();
//
//        //$debug = var_export($array,true);
//        $json = json_encode($users,JSON_UNESCAPED_UNICODE);

        return new JsonResponse();

    }

    private function parseInfo(Worksheet $sheet, $logger)
    {
        $emailCol = null; $firstnameCol = null; $lastnameCol = null; $typeCol= null; $bedRoomNumberCol = null;
        $firstRow = null; $lastRow = null;

        $lastCol = $sheet->getHighestDataColumn();
        $lastRow = (int)$sheet->getHighestDataRow();
        $headerfound = false;

        for ($i = 1; $i < $lastRow; $i++)
        {
            foreach ($this->colName as $col)
            {
                switch (trim($sheet->getCell($col.$i)->getValue())) {
                    case null:
                        $logger->info('null');
                        break;
                    case 'E-Mail':
                        $headerfound = true;
                        $emailCol = $col;
                        $logger->info('E-Mail found');
                        break;
                    case 'Prenom':
                        $firstnameCol = $col;
                        $logger->info('Prenom found');
                        break;
                    case 'Nom':
                        $lastnameCol = $col;
                        $logger->info('Nom found');
                        break;
                    case 'Etablissement':
                        $typeCol = $col;
                        $logger->info('Etablissement found');
                        break;
                    case 'No de logement':
                        $bedRoomNumberCol = $col;
                        $logger->info('No de logement found');
                        break;
                    default:
                        $logger->info($sheet->getCell($col.$i)->getValue());
                }

                if ($col == $lastCol) {
                    break 1;
                }
            }

            if ($headerfound) {
                $firstRow = $i + 1;
                break;
            }
        }

        $email = trim($sheet->getCell($emailCol.$firstRow)->getValue());

        if (!$headerfound || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new HttpException(401, 'Le contenu de l\'Excel n\'est pas valide');
        }


        return array($emailCol, $firstnameCol, $lastnameCol, $typeCol, $bedRoomNumberCol, $firstRow, $lastRow);
    }

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}

