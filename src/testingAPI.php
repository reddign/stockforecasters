
<form method="get">
    <input type="submit" name="Search1" id="Search1" value="1" />
    <input type="submit" name="Search2" id="Search2" value="2" />
    <input type="submit" name="Search3" id="Search3" value="3" />
<form>

        <?PHP

        if (isset($_GET['Search1'])) {
            echo "ONE";
        }
        if (isset($_GET['Search2'])) {
            echo "TWO";
        }
        if (isset($_GET['Search3'])) {
            echo "THREE";
        }


        ?>