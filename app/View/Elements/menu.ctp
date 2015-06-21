<!--Navigation Starts-->
            <nav>
            	<section class="nav_container">
                	<ul class="nav_links">
                    	<li>
                        	<a href="#">Dashboard</a>
                            <ul class="sublinks">
                            	<li><a href="#">Dummy 1</a></li>
                            	<li><a href="#">Dummy 2</a></li>
                            	<li><a href="#">Dummy 3</a></li>
                            	<li><a href="#">Dummy 4</a></li>
                            	<li><a href="#">Dummy 5</a></li>
                            	<li><a href="#">Dummy 6</a></li>
                            	<li><a href="#">Dummy 7</a></li>
                            </ul>
                        </li>
                        <li>
                        	<a href="#">Category Activity</a>
                            <ul class="sublinks">
                            	<li><a href="/aasthab/pinnacle/admin/Homes/managecategory">Manage Category</a></li>
                            	<li><a href="/aasthab/pinnacle/admin/Homes/addcat">Add Category</a></li>
                            	<li><a href="/aasthab/pinnacle/admin/Homes/addscat">Add SubCategory</a></li>
                            	<li><a href="/aasthab/pinnacle/admin/Homes/mngsubcategory">Manage Sub Category</a></li>
                            </ul>
                        </li>
                        <li>
                        	<a href="#">User Activity</a>
                            <ul class="sublinks">
                            	<li><a href="/aasthab/pinnacle/admin/Homes/mnguser">Manage User</a></li>
                            	<li><a href="/aasthab/pinnacle/admin/Homes/addusr">Add User</a></li>
                            	<li><a href="#">Dummy 3</a></li>
                            	<li><a href="#">Dummy 4</a></li>
                            	<li><a href="#">Dummy 5</a></li>
                            </ul>
                        </li>
                        <li>
                        	<a href="#">Payment</a>
                            <ul class="sublinks">
                            	<li><a href="#">Dummy 1</a></li>
                            	<li><a href="#">Dummy 2</a></li>
                            </ul>
                        </li>
                        <li>
                        	<a href="#">Details</a>
                            <ul class="sublinks">
                            	<li><a href="/aasthab/pinnacle/admin/Contents/pagelist">PageList</a></li>
                            	<li><a href="/aasthab/pinnacle/Contents/faq">View FAQ</a></li>
                            	<li><a href="/aasthab/pinnacle/Contents/contact_us">View Contact Us</a></li>
                            	<li><a href="/aasthab/pinnacle/Contents/about_us"> View Contact Us</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="account_logout">
                        <li>
                        	<?php echo $this->Html->link('Logout',array('controller'=>'Homes','action'=>'logout'),array('class'=>'logout')); ?>
                       <!--<a class="logout" href="/aastha/pinnacle/admin/Homes/logout">Logout</a>-->
                        </li>
                    	<li>
                        	<a class="my_acnt" href="#">My Account</a>
                        </li>
                    </ul>
                </section>
            </nav>
            <!--Navigation Ends-->
