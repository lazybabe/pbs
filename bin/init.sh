#!/bin/bash

pbs_dir=$(cd `dirname $0`;cd ..; pwd);

phing_src=$pbs_dir"/phing/bin/phing"
phing_dst="/usr/local/bin/phing"

build_src=$pbs_dir"/bin/buildprj.sh"
build_dst="/usr/local/bin/buildprj"

pbs_src=$pbs_dir"/bin/pbs.sh"
pbs_dst="/usr/local/bin/pbs"

if [ -L $phing_dst ]; then
    sudo rm $phing_dst
fi

if [ -L $build_dst ]; then
    sudo rm $build_dst
fi

if [ -L $pbs_dst ]; then
    sudo rm $pbs_dst
fi

sudo ln -s $phing_src $phing_dst

sudo ln -s $build_src $build_dst

sudo ln -s $pbs_src $pbs_dst

