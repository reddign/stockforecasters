<?PHP

function displayStockNews($stockName)
{
  echo $stockName;
  $html = file_get_html('https://finance.yahoo.com/quote/'.$stockName.'/news?p='.$stockName);
  for($i=0;$i<2;$i++) {
      $storyTitle = $html->find('a[class="js-content-viewer wafer-caas Fw(b) Fz(18px) Lh(23px) LineClamp(2,46px) Fz(17px)--sm1024 Lh(19px)--sm1024 LineClamp(2,38px)--sm1024 mega-item-header-link Td(n) C(#0078ff):h C(#000) LineClamp(2,46px) LineClamp(2,38px)--sm1024 not-isInStreamVideoEnabled"]', $i);
      $description = $html->find('p[class="Fz(14px) Lh(19px) Fz(13px)--sm1024 Lh(17px)--sm1024 LineClamp(2,38px) LineClamp(2,34px)--sm1024 M(0) D(n)--sm1024 Bxz(bb) Pb(2px)"]', $i);
      echo $storyTitle->plaintext . " "  . "<br>".$description."<br>";    
  
  }

}


?>