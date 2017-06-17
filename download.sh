#!/usr/bin/env bash

#
#       IMPORT CONTENUTI MAPPATI SU CONTENT TYPE "NEWS"
#

#
#       NOTIZIE
#

# Notizie con tnid = 0
wget http://www.sardegnaimpresa.eu/it/api/si7_notizia_tnid_0.json -O modules/custom/migrando/files/si8_notizia_tnid_0.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_notizia_tnid_0.json
echo "}" >> modules/custom/migrando/files/si8_notizia_tnid_0.json

# Notizie con tnid no 0
wget http://www.sardegnaimpresa.eu/it/api/si7_notizia_tnid_no_0.json -O modules/custom/migrando/files/si8_notizia_tnid_no_0.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_notizia_tnid_no_0.json
echo "}" >> modules/custom/migrando/files/si8_notizia_tnid_no_0.json

#
#       EVENTO
#

# Evento con tnid = 0
wget http://www.sardegnaimpresa.eu/it/api/si7_evento_tnid_0.json -O modules/custom/migrando/files/si8_evento_tnid_0.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_evento_tnid_0.json
echo "}" >> modules/custom/migrando/files/si8_evento_tnid_0.json

# Evento con tnid no 0
wget http://www.sardegnaimpresa.eu/it/api/si7_evento_tnid_no_0.json -O modules/custom/migrando/files/si8_evento_tnid_no_0.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_evento_tnid_no_0.json
echo "}" >> modules/custom/migrando/files/si8_evento_tnid_no_0.json

#
#       SARDEGNASUAP NOTIZIA
#
# Sardegnasuap notizia con tnid = 0
wget http://www.sardegnaimpresa.eu/it/api/si7_sardegnasuapnotizia_tnid_0.json -O modules/custom/migrando/files/si8_sardegnasuapnotizia_tnid_0.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_sardegnasuapnotizia_tnid_0.json
echo "}" >> modules/custom/migrando/files/si8_sardegnasuapnotizia_tnid_0.json

# Sardegnasuap notizia con tnid no 0
wget http://www.sardegnaimpresa.eu/it/api/si7_sardegnasuapnotizia_tnid_no_0.json -O modules/custom/migrando/files/si8_sardegnasuapnotizia_tnid_no_0.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_sardegnasuapnotizia_tnid_no_0.json
echo "}" >> modules/custom/migrando/files/si8_sardegnasuapnotizia_tnid_no_0.json

#####################################################################################################

#
#       IMPORT CONTENUTI MAPPATI SU CONTENT TYPE "PAGE"
#


#
#       ARTICOLO
#
# Articolo con tnid = 0
wget http://www.sardegnaimpresa.eu/it/api/si7_articolo_tnid_0.json -O modules/custom/migrando/files/si8_articolo_tnid_0.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_articolo_tnid_0.json
echo "}" >> modules/custom/migrando/files/si8_articolo_tnid_0.json

# Articolo con tnid no 0
wget http://www.sardegnaimpresa.eu/it/api/si7_articolo_tnid_no_0.json -O modules/custom/migrando/files/si8_articolo_tnid_no_0.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_articolo_tnid_no_0.json
echo "}" >> modules/custom/migrando/files/si8_articolo_tnid_no_0.json
#
#       PAGINA STATICA
#

# Pagina statica con tnid = 0
wget http://www.sardegnaimpresa.eu/it/api/si7_paginastatica_tnid_0.json -O modules/custom/migrando/files/si8_paginastatica_tnid_0.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_paginastatica_tnid_0.json
echo "}" >> modules/custom/migrando/files/si8_paginastatica_tnid_0.json

# Pagina statica con tnid no 0
wget http://www.sardegnaimpresa.eu/it/api/si7_paginastatica_tnid_no_0.json -O modules/custom/migrando/files/si8_paginastatica_tnid_no_0.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_paginastatica_tnid_no_0.json
echo "}" >> modules/custom/migrando/files/si8_paginastatica_tnid_no_0.json

#
#       SARDEGNA SUAP PAGINA
#

# Sardegna Suap pagina con tnid = 0
wget http://www.sardegnaimpresa.eu/it/api/si7_sardegnasuappagina_tnid_0.json -O modules/custom/migrando/files/si8_sardegnasuappagina_tnid_0.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_sardegnasuappagina_tnid_0.json
echo "}" >> modules/custom/migrando/files/si8_sardegnasuappagina_tnid_0.json

# Sardegna Suap pagina con tnid no 0
wget http://www.sardegnaimpresa.eu/it/api/si7_sardegnasuappagina_tnid_no_0.json -O modules/custom/migrando/files/si8_sardegnasuappagina_tnid_no_0.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_sardegnasuappagina_tnid_no_0.json
echo "}" >> modules/custom/migrando/files/si8_sardegnasuappagina_tnid_no_0.json

#####################################################################################################

#       FAQ FAQ (che non hanno il filtro per "trova procedimento")
#
wget http://www.sardegnaimpresa.eu/it/api/si7_faq_faq.json -O modules/custom/migrando/files/si8_faq_faq.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_faq_faq.json
echo "}" >> modules/custom/migrando/files/si8_faq_faq.json

#####################################################################################################

#       FAQ di TROVA PROCEDIMENTO (che hanno il filtro per "trova procedimento")
#
wget http://www.sardegnaimpresa.eu/it/api/si7_faq_procedimento.json -O modules/custom/migrando/files/si8_faq_procedimento.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_faq_procedimento.json
echo "}" >> modules/custom/migrando/files/si8_faq_procedimento.json

#####################################################################################################

#       GLOSSARIO
#
wget http://www.sardegnaimpresa.eu/it/si7_glossario.json -O modules/custom/migrando/files/si8_glossario.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_glossario.json
echo "}" >> modules/custom/migrando/files/si8_glossario.json

#####################################################################################################

#####################################################################################################

#       TABELLONE
#
wget http://www.sardegnaimpresa.eu/it/api/si7_tabellone.json -O modules/custom/migrando/files/si8_tabellone.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_tabellone.json
echo "}" >> modules/custom/migrando/files/si8_tabellone.json

#####################################################################################################


#       FILES
#
wget http://www.sardegnaimpresa.eu/it/api/si7_files_img.json -O modules/custom/migrando/files/si8_files_img.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_files_img.json
echo "}" >> modules/custom/migrando/files/si8_files_img.json

wget http://www.sardegnaimpresa.eu/it/api/si7_files_no_img.json -O modules/custom/migrando/files/si8_files_no_img.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_files_no_img.json
echo "}" >> modules/custom/migrando/files/si8_files_no_img.json

#####################################################################################################

#       TERMINI DELLA TASSONOMIA
#

wget http://www.sardegnaimpresa.eu/it/api/si7_termini.json -O modules/custom/migrando/files/si8_termini.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_termini.json
echo "}" >> modules/custom/migrando/files/si8_termini.json

#####################################################################################################

#        UTENTI 
wget http://www.sardegnaimpresa.eu/it/api/si7_utenti.json -O modules/custom/migrando/files/si8_utenti.json
sed -i -e '1i{"items":\' modules/custom/migrando/files/si8_utenti.json
echo "}" >> modules/custom/migrando/files/si8_utenti.json