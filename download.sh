#!/usr/bin/env bash

wget http://localhost:8888/it/api/si7_utenti.json -O modules/custom/migrando/files/si8_utenti.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_utenti.json
echo "}" >> modules/custom/migrando/files/si8_utenti.json