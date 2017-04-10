	<?php
        require_once "lang.php";
    ?>

</div>
    <footer>
        <div class = "inner_footer">
            <ul>
                <li><a href = ""><?php echo $_SESSION['lang']=='am' ? 'Ստեղծել Հաշիվ' : 'Create an account'; ?></a></li>
                <li><a href = ""><?php echo $_SESSION['lang']=='am' ? 'Պատվերների ցանկ' : 'List orders'; ?></a></li>
                <li><a href = ""><?php echo $_SESSION['lang']=='am' ? 'Համեմատել' : 'Compare'; ?></a></li>
                <li><a href = ""><?php echo $_SESSION['lang']=='am' ? 'Ավելացնել' : 'Wishlist'; ?></a></li>
            </ul>
            <ul>
                <li><a href = ""><?php echo $_SESSION['lang']=='am' ? 'Մեր մասին' : 'About Us'; ?></a></li>
                <li><a href = ""><?php echo $_SESSION['lang']=='am' ? 'Պայմաններ' : 'Terms & Conditions'; ?></a></li>
                <li><a href = ""><?php echo $_SESSION['lang']=='am' ? 'Հաշվեհամար' : 'Account'; ?></a></li>
            </ul>
            <ul>
                <li><a href = ""><?php echo $_SESSION['lang']=='am' ? 'Ֆեյսբուք' : 'Facebook'; ?></a></li>
                <li><a href = ""><?php echo $_SESSION['lang']=='am' ? 'Թվիթեռ' : 'Twitter'; ?></a></li>
                <li><a href = ""><?php echo $_SESSION['lang']=='am' ? 'Սկայպ' : 'Skype'; ?></a></li>
            </ul>
            <ul>
                <li><?php  echo $_SESSION['lang'] == "am" ? 'Զանգահարեք մեզ այժմ...' : 'Call us now for free'?></li><br>
                <li style = "font-size:22px; color:blue">(800) 2345-6789</li><br>
                <li><?php echo $_SESSION['lang'] == "am" ? 'Հասցե՝ Քաղաք Երևան, Կոմիտաս փողոց։' : 'My Company , 9870 St Vincent Place,<br>Glasgow, DC 45 Fr 45.' ?> </li>
            </ul>
        </div>
        <span class = "underground"><?php echo $_SESSION['lang'] == "am" ? 'Երևան հրատարակչություն ©2017' : 'Wilson & Smith  ©2017 Privacy Policy'?><a href = ""></a></span>
    </footer>
	</body>
</html>