" Libyaf Debug方法: \Helper\Debug::vars($var);
nnoremap <Leader>dv <Esc>:pu=\"\\Helper\\Debug::vars(\".expand(\"<cword>\").\");\"<CR>==$
nnoremap <Leader>dV <Esc>:pu=\"\\Helper\\Debug::vars(\".expand(\"<cWORD>\").\");\"<CR>==$

" YAF build
nnoremap <F8> :!pbs build<CR>
nnoremap <F2> :!pbs test<CR>
