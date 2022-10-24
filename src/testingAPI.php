<html>

<body>
        <form method="get">
                <input type="submit" name="Search" id="Search" value="Search" />
                <input type="submit" name="Search" id="Search1" value="Search1" />
        </form>
</body>

<?PHP

if (isset($_GET['Search'])) {
        echo "1";
}
 else if (isset($_GET['Search1'])) {
        echo "2";
}

?>