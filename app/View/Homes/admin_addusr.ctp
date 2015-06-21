<style>
div{
padding:20px;
}
input { border:1px solid #005889; box-shadow:2px 2px 3px -1px #444; padding:5px 6px; color:#333; font-style:italic; }

</style>
 <section id="cont_wrapper">
            	<!--Content Starts-->
                <section class="content">
                	<!--Main Heading Starts-->
                    <h1 class="main_heading">Form</h1>
                    <!--Main Heading Ends-->
                    <!--Conetnt Info Starts Here-->
                    <section class="content_info">

                    	<ul class="form">
                    	<li>
                    	<?php echo $this->Form->create('User',array('inputDefaults'=>array('div'=>false,'label'=>false))); ?>
                            	<label>Name :</label>
                            	<?php echo $this->Form->input('username',array('id'=>'name','class'=>"form_input")); ?>
                        </li>
                        	<li>
                            	<label>Email :</label>
                          
            <?php echo $this->Form->input('email',array('class'=>'form_input','type'=>"text",'placeholder'=>"Enter your email",'label'=>false,'div'=>false)); ?>
                                <!--<input class="form_input" type="text" placeholder="Enter your email"/>-->
                            </li>
                            <li>
                            	<label>Password :</label>
  <?php echo $this->Form->input('password',array('class'=>'form_input error','type'=>"password",'placeholder'=>"Enter your password",'label'=>false,'div'=>false)); ?>                           	
                               <!-- <input class="form_input error" type="password" placeholder="Enter your password"/>-->
                            </li>
                            <li>
                            	<label>Confirm Password :</label>
    <?php echo $this->Form->input('password',array('class'=>'form_input','type'=>"password",'placeholder'=>"Confirm your password",'label'=>false,'div'=>false)); ?>                         	
                               <!-- <input class="form_input" type="password" placeholder="Confirm your password"/>-->
                            </li>

	
	 <li>
                            	<label>Upload Image1 :</label>
       <?php echo $this->Form->input('image',array('class'=>'form_input','type'=>"text",'placeholder'=>"Upload your image",'type'=>'text','label'=>false,'div'=>false)); ?>  
       </li>
		 <li>
                            	<label>&nbsp;</label>
 <?php echo $this->Form->input('Submit',array('class'=>"blu_btn mar_rt", 'value'=>'Submit','type'=>'Submit','label'=>false,'div'=>false));?>        
  <?php echo $this->Form->input('Reset',array('class'=>"grey_btn", 'value'=>'Reset','type'=>'Reset','label'=>false,'div'=>false));?>                     	
                           <!-- <input class="blu_btn mar_rt" type="button" value="Submit"/>
                                <input class="grey_btn" type="button" value="Reset"/>-->
                            </li>
                        </ul>
                        <section class="clr_bth"></section>
                    </section>
                    </section>
