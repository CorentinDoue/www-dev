#!bin/bash
for image in *.png; 
do
	echo resize "${image}" ...
	convert "${image}" -resize 50x50 "${image}"
done