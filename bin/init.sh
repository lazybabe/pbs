#!/bin/bash

pbs_dir=$(cd `dirname $0`;cd ..; pwd);

phing_src=$pbs_dir"/phing/bin/phing"
phing_dst="/usr/local/bin/phing"

build_src=$pbs_dir"/bin/buildprj.sh"
build_dst="/usr/local/bin/buildprj"

pbs_src=$pbs_dir"/bin/pbs.sh"
pbs_dst="/usr/local/bin/pbs"

phpunit_src=$pbs_dir"/bin/phpunit"
phpunit_dst="/usr/local/bin/phpunit"

sudo ln -sf $phing_src $phing_dst

sudo ln -sf $build_src $build_dst

sudo ln -sf $pbs_src $pbs_dst

sudo ln -sf $phpunit_src $phpunit_dst

