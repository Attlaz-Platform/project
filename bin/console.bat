@ECHO OFF
docker run --rm -it -v %cd%:/var/attlaz -w /var/attlaz hq.attlaz.com:2498/attlaz_worker:08-11-19_00h48 php bin/console %*