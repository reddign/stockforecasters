<?PHP
require("functions/basic_html_functions.php");
echo "hello";
$html = file_get_html('https://finance.yahoo.com');
$status = $html->find('svg[class="Mend(5px) Cur(a)! Fill($tertiaryColor) Cur(p)"]', 0);
echo $status->plaintext;
?>