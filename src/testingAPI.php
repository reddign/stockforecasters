<form method="get">
    <input style="width:115px; border-width:3px border-style=solid; border-color:black;" type="text" id="Intstock" name="Intstock" placeholder="Stock Name">
    <input type="submit" name="Search" id="Search" value="Search" />
    <input type="submit" name="action1" id="action1" value="action1" />
    <input type="submit" name="action2" id="action2" value="action2" />
</form>



<?PHP

if (isset($_GET['Search'])) {
?>
    <form method="get">
        <label name="test" id="test"> <?PHP echo $_GET['Intstock'] ?>
    </form>
<?PHP
} elseif (isset($_GET['action1'])) {
    echo "clicked 1";
    echo $_GET['test'];
} elseif (isset($_GET['action2'])) {
    echo "clicked 2";

}
?>