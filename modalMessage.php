<?php
function modalTitle($op)
{
  if($op == 'success')
    $title = 'Berjaya!';
  else
    $title = 'Amaran!';

  return $title;
}
function modalMessage($op)
{
  if($op == 'success')
    $msg = 'Data telah berjaya dikemaskini.';
  else if($op == 'errkod')
    $msg = 'Data tidak berjaya dikemaskini.';

  return $msg;
}

function modalDelTitle($del)
{
  if($del == 'success')
    $title = 'Berjaya!';
  else
    $title = 'Amaran!';

  return $title;
}
function modalDelMessage($del)
{
  if($del == 'success')
    $msg = 'Data telah berjaya dipadam.';
  else if($del == 'errkod')
    $msg = 'Data tidak berjaya dipadam.';

  return $msg;
}
?>