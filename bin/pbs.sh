#!/bin/bash

phing="/usr/local/bin/phing"

if [ ! -x $phing ]; then
    echo "phing: command not found"
    exit
fi

bin_dir=$(dirname `readlink -f $0`)

pbs_dir=$(cd $bin_dir; cd ..; pwd);

buildxml=$pbs_dir"/build/pbs.xml"

if [ $1 ]; then
    $phing -f $buildxml ${1/,/ }
else
    $phing -l -q -f $buildxml
fi

