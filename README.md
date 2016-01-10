本工具暂支持开发环境构建和启动

1. root执行 bin/init.sh
2. 创建~/devspace目录
3. ~/devspace下安装libyaf
4. 执行 buildprj ，按提示输入参数，即可创建一个基于YAF框架的项目
5. 进入创建好的项目目录，执行 pbs 查看可用参数
6. 执行 pbs build ，启动项目

PS:启动项目，依赖
nginx   /usr/local/nginx
php-fpm /usr/local/php

