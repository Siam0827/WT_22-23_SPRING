<?php
    function Tsearch()
    {
        $food1 = array("title"=>"Crispy Chicken Burger", "description"=>"This crispy chicken burger with honey mustard sauce makes for a crunchy goodness, served with potato juice.", "price"=>"690", "id"=>1);

        $food2 = array("title"=>"Mexican Grilled Chicken", "description"=>"Prepared with spicy mexican seasoning marinated grilled chicken leg, served with fried rice & sauteed vegetable.", "price"=>"320", "id"=>2);

        $food3 = array("title"=>"Creamy Mushroom Chicken", "description"=>"Prepared with pan fried chicken breast cooked in creamy garlic mushroom, served with fried rice & sauteed vegetables.", "price"=>"320", "id"=>3);

        $food4 = array("title"=>"Chicken Cordon", "description"=>"Prepared with ham & cheese stuffed fried chicken breast, served with mashed potato & sauteed vegetable.", "price"=>"320", "id"=>4);
      
        $foods = array($food1, $food2, $food3, $food2);

        $found = false;

        echo '<center>';
        foreach ($foods as $item) {
            if (strpos(strtolower($item['title']), strtolower($_POST['search'])) !== false) {
                $found = true;
                echo '            
                <div style="max-width:20rem; border:1px solid black; margin-bottom:30px; padding:10px;">
                    <h3>' . $item['title'] . '</h3>
                    <p>' . $item['description'] . '</p>
                    <h4>Price: ' . $item['price'] . 'tk</h4>
                    <a href="Tpayment.php"><button type="button">Buy</button></a>
                </div>';
            }
        }
        if (!$found)
            echo '<h3 style="color:red;">Sorry ' . $_SESSION["username"] . '! ' . $_POST['search'] . ' is not available.</h3>';
        echo '</center>';
    }
