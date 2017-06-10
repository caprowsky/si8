#!/usr/bin/env bash

# Utenti 
wget http://localhost:8888/it/api/si7_utenti.json -O modules/custom/migrando/files/si8_utenti.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_utenti.json
echo "}" >> modules/custom/migrando/files/si8_utenti.json

#
#       NOTIZIE
#

# Notizie con tnid = 0
wget http://localhost:8888/en/api/si7_notizia_tnid_0.json -O modules/custom/migrando/files/si8_notizia_tnid_0.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_notizia_tnid_0.json
echo "}" >> modules/custom/migrando/files/si8_notizia_tnid_0.json


# Notizie con tnid no 0
wget http://localhost:8888/en/api/si7_notizia_tnid_no_0.json -O modules/custom/migrando/files/si8_notizia_tnid_no_0.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_notizia_tnid_no_0.json
echo "}" >> modules/custom/migrando/files/si8_notizia_tnid_no_0.json



#
#       PAGINE STATICHE
#



#
#       FILES
#

wget http://localhost:8888/it/api/si7_files_img.json -O modules/custom/migrando/files/si8_files_img.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_files_img.json
echo "}" >> modules/custom/migrando/files/si8_files_img.json

wget http://localhost:8888/it/api/si7_files_no_img.json -O modules/custom/migrando/files/si8_files_no_img.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_files_no_img.json
echo "}" >> modules/custom/migrando/files/si8_files_no_img.json