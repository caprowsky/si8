#!/usr/bin/env bash

# Utenti 
wget http://localhost:8888/it/api/si7_utenti.json -O modules/custom/migrando/files/si8_utenti.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_utenti.json
echo "}" >> modules/custom/migrando/files/si8_utenti.json

#
#       NOTIZIE
#

# Notizie in italiano
wget http://localhost:8888/it/api/si7_notizia_it.json -O modules/custom/migrando/files/si8_notizia_it.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_notizia_it.json
echo "}" >> modules/custom/migrando/files/si8_notizia_it.json


# Notizie in inglese
wget http://localhost:8888/it/api/si7_notizia_en.json -O modules/custom/migrando/files/si8_notizia_en.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_notizia_en.json
echo "}" >> modules/custom/migrando/files/si8_notizia_en.json

# Notizie in spagnolo
wget http://localhost:8888/it/api/si7_notizia_es.json -O modules/custom/migrando/files/si8_notizia_es.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_notizia_es.json
echo "}" >> modules/custom/migrando/files/si8_notizia_es.json

#
#       PAGINE STATICHE
#

# Pagine statiche in IT EN ES con TNID > 0
wget http://localhost:8888/it/api/si7_pagina_it_en_es_tnid1.json -O modules/custom/migrando/files/si8_pagina_it_en_es_tnid1.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_pagina_it_en_es_tnid1.json
echo "}" >> modules/custom/migrando/files/si8_pagina_it_en_es_tnid1.json

# Pagine statiche in IT EN ES con TNID = 0
wget http://localhost:8888/it/api/si7_pagina_it_en_es_tnid0.json -O modules/custom/migrando/files/si8_pagina_it_en_es_tnid0.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_pagina_it_en_es_tnid0.json
echo "}" >> modules/custom/migrando/files/si8_pagina_it_en_es_tnid0.json

#
#       FILES
#

wget http://localhost:8888/it/api/si7_files_img.json -O modules/custom/migrando/files/si8_files_img.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_files_img.json
echo "}" >> modules/custom/migrando/files/si8_files_img.json

wget http://localhost:8888/it/api/si7_files_no_img.json -O modules/custom/migrando/files/si8_files_no_img.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_files_no_img.json
echo "}" >> modules/custom/migrando/files/si8_files_no_img.json