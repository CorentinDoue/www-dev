<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = $allowSchemes = array();
        if ($ret = $this->doMatch($pathinfo, $allow, $allowSchemes)) {
            return $ret;
        }
        if ($allow) {
            throw new MethodNotAllowedException(array_keys($allow));
        }
        if (!in_array($this->context->getMethod(), array('HEAD', 'GET'), true)) {
            // no-op
        } elseif ($allowSchemes) {
            redirect_scheme:
            $scheme = $this->context->getScheme();
            $this->context->setScheme(key($allowSchemes));
            try {
                if ($ret = $this->doMatch($pathinfo)) {
                    return $this->redirect($pathinfo, $ret['_route'], $this->context->getScheme()) + $ret;
                }
            } finally {
                $this->context->setScheme($scheme);
            }
        } elseif ('/' !== $pathinfo) {
            $pathinfo = '/' !== $pathinfo[-1] ? $pathinfo.'/' : substr($pathinfo, 0, -1);
            if ($ret = $this->doMatch($pathinfo, $allow, $allowSchemes)) {
                return $this->redirect($pathinfo, $ret['_route']) + $ret;
            }
            if ($allowSchemes) {
                goto redirect_scheme;
            }
        }

        throw new ResourceNotFoundException();
    }

    private function doMatch(string $rawPathinfo, array &$allow = array(), array &$allowSchemes = array()): ?array
    {
        $allow = $allowSchemes = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $context = $this->context;
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        switch ($pathinfo) {
            default:
                $routes = array(
                    '/' => array(array('_route' => 'index', '_controller' => 'App\\Controller\\DefaultController::index'), null, null, null),
                    '/register' => array(array('_route' => 'register', '_controller' => 'App\\Controller\\AuthController::register'), null, array('POST' => 0), null),
                    '/api/hello' => array(array('_route' => 'api', '_controller' => 'App\\Controller\\AuthController::api'), null, null, null),
                    '/login_check' => array(array('_route' => 'login_check'), null, null, null),
                );

                if (!isset($routes[$pathinfo])) {
                    break;
                }
                list($ret, $requiredHost, $requiredMethods, $requiredSchemes) = $routes[$pathinfo];

                $hasRequiredScheme = !$requiredSchemes || isset($requiredSchemes[$context->getScheme()]);
                if ($requiredMethods && !isset($requiredMethods[$canonicalMethod]) && !isset($requiredMethods[$requestMethod])) {
                    if ($hasRequiredScheme) {
                        $allow += $requiredMethods;
                    }
                    break;
                }
                if (!$hasRequiredScheme) {
                    $allowSchemes += $requiredSchemes;
                    break;
                }

                return $ret;
        }

        $matchedPathinfo = $pathinfo;
        $regexList = array(
            0 => '{^(?'
                    .'|/api(?'
                        .'|(?:/(index)(?:\\.([^/]++))?)?(*:42)'
                        .'|/(?'
                            .'|docs(?:\\.([^/]++))?(*:72)'
                            .'|contexts/(.+)(?:\\.([^/]++))?(*:107)'
                            .'|r(?'
                                .'|eservations(?'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:151)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:189)'
                                    .')'
                                .')'
                                .'|ooms(?'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:224)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:262)'
                                    .')'
                                .')'
                            .')'
                            .'|users(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:299)'
                                .')'
                                .'|/(?'
                                    .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:340)'
                                    .')'
                                    .'|names(*:354)'
                                .')'
                            .')'
                        .')'
                    .')'
                    .'|/_error/(\\d+)(?:\\.([^/]++))?(*:394)'
                .')$}sD',
        );

        foreach ($regexList as $offset => $regex) {
            while (preg_match($regex, $matchedPathinfo, $matches)) {
                switch ($m = (int) $matches['MARK']) {
                    case 151:
                        $matches = array('_format' => $matches[1] ?? null);

                        // api_reservations_get_collection
                        $ret = $this->mergeDefaults(array('_route' => 'api_reservations_get_collection') + $matches, array('_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Reservation', '_api_collection_operation_name' => 'get'));
                        if (!isset(($a = array('GET' => 0))[$canonicalMethod])) {
                            $allow += $a;
                            goto not_api_reservations_get_collection;
                        }

                        return $ret;
                        not_api_reservations_get_collection:

                        // api_reservations_post_collection
                        $ret = $this->mergeDefaults(array('_route' => 'api_reservations_post_collection') + $matches, array('_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Reservation', '_api_collection_operation_name' => 'post'));
                        if (!isset(($a = array('POST' => 0))[$requestMethod])) {
                            $allow += $a;
                            goto not_api_reservations_post_collection;
                        }

                        return $ret;
                        not_api_reservations_post_collection:

                        break;
                    case 189:
                        $matches = array('id' => $matches[1] ?? null, '_format' => $matches[2] ?? null);

                        // api_reservations_get_item
                        $ret = $this->mergeDefaults(array('_route' => 'api_reservations_get_item') + $matches, array('_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Reservation', '_api_item_operation_name' => 'get'));
                        if (!isset(($a = array('GET' => 0))[$canonicalMethod])) {
                            $allow += $a;
                            goto not_api_reservations_get_item;
                        }

                        return $ret;
                        not_api_reservations_get_item:

                        // api_reservations_delete_item
                        $ret = $this->mergeDefaults(array('_route' => 'api_reservations_delete_item') + $matches, array('_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Reservation', '_api_item_operation_name' => 'delete'));
                        if (!isset(($a = array('DELETE' => 0))[$requestMethod])) {
                            $allow += $a;
                            goto not_api_reservations_delete_item;
                        }

                        return $ret;
                        not_api_reservations_delete_item:

                        // api_reservations_put_item
                        $ret = $this->mergeDefaults(array('_route' => 'api_reservations_put_item') + $matches, array('_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Reservation', '_api_item_operation_name' => 'put'));
                        if (!isset(($a = array('PUT' => 0))[$requestMethod])) {
                            $allow += $a;
                            goto not_api_reservations_put_item;
                        }

                        return $ret;
                        not_api_reservations_put_item:

                        break;
                    case 224:
                        $matches = array('_format' => $matches[1] ?? null);

                        // api_rooms_get_collection
                        $ret = $this->mergeDefaults(array('_route' => 'api_rooms_get_collection') + $matches, array('_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Room', '_api_collection_operation_name' => 'get'));
                        if (!isset(($a = array('GET' => 0))[$canonicalMethod])) {
                            $allow += $a;
                            goto not_api_rooms_get_collection;
                        }

                        return $ret;
                        not_api_rooms_get_collection:

                        // api_rooms_post_collection
                        $ret = $this->mergeDefaults(array('_route' => 'api_rooms_post_collection') + $matches, array('_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Room', '_api_collection_operation_name' => 'post'));
                        if (!isset(($a = array('POST' => 0))[$requestMethod])) {
                            $allow += $a;
                            goto not_api_rooms_post_collection;
                        }

                        return $ret;
                        not_api_rooms_post_collection:

                        break;
                    case 262:
                        $matches = array('id' => $matches[1] ?? null, '_format' => $matches[2] ?? null);

                        // api_rooms_get_item
                        $ret = $this->mergeDefaults(array('_route' => 'api_rooms_get_item') + $matches, array('_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Room', '_api_item_operation_name' => 'get'));
                        if (!isset(($a = array('GET' => 0))[$canonicalMethod])) {
                            $allow += $a;
                            goto not_api_rooms_get_item;
                        }

                        return $ret;
                        not_api_rooms_get_item:

                        // api_rooms_delete_item
                        $ret = $this->mergeDefaults(array('_route' => 'api_rooms_delete_item') + $matches, array('_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Room', '_api_item_operation_name' => 'delete'));
                        if (!isset(($a = array('DELETE' => 0))[$requestMethod])) {
                            $allow += $a;
                            goto not_api_rooms_delete_item;
                        }

                        return $ret;
                        not_api_rooms_delete_item:

                        // api_rooms_put_item
                        $ret = $this->mergeDefaults(array('_route' => 'api_rooms_put_item') + $matches, array('_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Room', '_api_item_operation_name' => 'put'));
                        if (!isset(($a = array('PUT' => 0))[$requestMethod])) {
                            $allow += $a;
                            goto not_api_rooms_put_item;
                        }

                        return $ret;
                        not_api_rooms_put_item:

                        break;
                    case 299:
                        $matches = array('_format' => $matches[1] ?? null);

                        // api_users_get_collection
                        $ret = $this->mergeDefaults(array('_route' => 'api_users_get_collection') + $matches, array('_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'get'));
                        if (!isset(($a = array('GET' => 0))[$canonicalMethod])) {
                            $allow += $a;
                            goto not_api_users_get_collection;
                        }

                        return $ret;
                        not_api_users_get_collection:

                        // api_users_post_collection
                        $ret = $this->mergeDefaults(array('_route' => 'api_users_post_collection') + $matches, array('_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'post'));
                        if (!isset(($a = array('POST' => 0))[$requestMethod])) {
                            $allow += $a;
                            goto not_api_users_post_collection;
                        }

                        return $ret;
                        not_api_users_post_collection:

                        break;
                    case 340:
                        $matches = array('id' => $matches[1] ?? null, '_format' => $matches[2] ?? null);

                        // api_users_get_item
                        $ret = $this->mergeDefaults(array('_route' => 'api_users_get_item') + $matches, array('_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'get'));
                        if (!isset(($a = array('GET' => 0))[$canonicalMethod])) {
                            $allow += $a;
                            goto not_api_users_get_item;
                        }

                        return $ret;
                        not_api_users_get_item:

                        // api_users_delete_item
                        $ret = $this->mergeDefaults(array('_route' => 'api_users_delete_item') + $matches, array('_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'delete'));
                        if (!isset(($a = array('DELETE' => 0))[$requestMethod])) {
                            $allow += $a;
                            goto not_api_users_delete_item;
                        }

                        return $ret;
                        not_api_users_delete_item:

                        // api_users_put_item
                        $ret = $this->mergeDefaults(array('_route' => 'api_users_put_item') + $matches, array('_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'put'));
                        if (!isset(($a = array('PUT' => 0))[$requestMethod])) {
                            $allow += $a;
                            goto not_api_users_put_item;
                        }

                        return $ret;
                        not_api_users_put_item:

                        break;
                    default:
                        $routes = array(
                            42 => array(array('_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => '1', 'index' => 'index'), array('index', '_format'), null, null),
                            72 => array(array('_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_api_respond' => '1', '_format' => ''), array('_format'), null, null),
                            107 => array(array('_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_api_respond' => '1', '_format' => 'jsonld'), array('shortName', '_format'), null, null),
                            354 => array(array('_route' => 'api_user_name_d_t_os_get_collection', '_controller' => 'App\\Controller\\GetUserNameDTO', '_format' => null, '_api_resource_class' => 'App\\DTO\\UserNameDTO', '_api_collection_operation_name' => 'get'), array(), array('GET' => 0), null),
                            394 => array(array('_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code', '_format'), null, null),
                        );

                        list($ret, $vars, $requiredMethods, $requiredSchemes) = $routes[$m];

                        foreach ($vars as $i => $v) {
                            if (isset($matches[1 + $i])) {
                                $ret[$v] = $matches[1 + $i];
                            }
                        }

                        $hasRequiredScheme = !$requiredSchemes || isset($requiredSchemes[$context->getScheme()]);
                        if ($requiredMethods && !isset($requiredMethods[$canonicalMethod]) && !isset($requiredMethods[$requestMethod])) {
                            if ($hasRequiredScheme) {
                                $allow += $requiredMethods;
                            }
                            break;
                        }
                        if (!$hasRequiredScheme) {
                            $allowSchemes += $requiredSchemes;
                            break;
                        }

                        return $ret;
                }

                if (394 === $m) {
                    break;
                }
                $regex = substr_replace($regex, 'F', $m - $offset, 1 + strlen($m));
                $offset += strlen($m);
            }
        }
        if ('/' === $pathinfo && !$allow) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        return null;
    }
}
