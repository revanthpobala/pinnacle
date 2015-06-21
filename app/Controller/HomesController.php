<?php
class HomesController extends AppController
{
	var $name="Homes";
	var $uses="Admin";
	var $helpers=array('Html','Form','Js');
	public function index()
	{
		//$this->layout="dashboard";
		$aa='http://'.$_SERVER['HTTP_HOST'].'/aasthab/pinnacle/';
		//pr($_SERVER);
		define("SITE_URL",$aa);
		echo SITE_URL;
		$this->autoRender=false;
		echo "<br>Administrator,Please Visit Login Page 
		<a href='<?php echo SITE_URL?>/admin'>admin page</a>";
		
	}
	/***********************************************Admin Login***********************/
	public function admin_login()
	{
	     $this->layout="admin";
		if(!empty($this->request->data)){
			$email=$this->data['Admin']['email']; 
			$password=$this->data['Admin']['password'];//pr(md5($password));die;
			$result=$this->Admin->find('first',array(
				'condition'=>array('
					Admin.email'=>$email,
					'Admin.password'=>md5($password))
					));
				//pr($result);die;
				if(!empty($result))
				{ 
					$this->Session->write('id',$result['Admin']['id']);
					$this->Session->write('email',$result['Admin']['email']);
					$this->Session->write('name',$result['Admin']['name']);
					$this->Session->setFlash('Welcome to Ur DashBoard');
					//echo "Successfully";
					//pr($this->Session->read('email'));die;
					$this->redirect('dashboard');
				}
				else
				{
					echo "Incorrect";
				}
						}
			
	}
		
		public function admin_dashboard()
		{
			$this->layout="dashboard";
			if($this->Session->check('id'))
			{
				
			}
			else 
			{
				$this->Session->setFlash("Please Login First ");
				$this->redirect('login');;
			}
		//$this->autoRender=false;
		//echo $this->Session->read('email');
		}  
		public function admin_logout()
		{
			$this->autoRender=false;
			$this->layout="dashboard";
			$this->Session->destroy();
			$this->Session->setFlash("You are Successfully Logout");
			$this->redirect('login');
		}
		
	/*************************User Login************************************************/
	public function login()
	{
		//$this->layout="public2";
		$this->loadModel('User');
		if(!empty($this->request->data)){
				$email=$this->data['User']['email']; 
				$password=$this->data['User']['password'];
				$result=$this->User->find('first',array(
					'condition'=>array(
						'User.email'=>$email,
						'User.password'=>md5($password)
						)));
				
				if(!empty($result))
				{ 
					$this->Session->write('id',$result['User']['id']);
					$this->Session->write('email',$result['User']['email']);
					$this->Session->write('name',$result['User']['name']);
					$this->Session->setFlash('Welcome to Ur DashBoard');
					$this->redirect('dashboard');
				}
				else
				{
					echo "Incorrect";
				}
			}
			
		}
		public function logout()
		{
			$this->autoRender=false;
			$this->Session->destroy();
			$this->Session->setFlash("You are Successfully Logout");
			$this->redirect('login');
		}
		public function register()
		{
			//$this->layout="public2";
			$this->loadModel('User');
			if(!empty($this->data))
			{
				$this->User->save($this->data);
				$this->Session->setFlash("You are successfully Registered");
				$this->redirect('login');
			}
			
		}
		/***********************admin category**********************/
		public function admin_addcat()
			{
				$this->layout="dashboard";
				$this->loadModel('Category');
		
				if($this->request->is('post')){
					
					$n=$this->data['name'];
					
					$this->request->data['Category']['parent_id'] =0;
					//pr($this->data);die;
					$dat=array(
					'Category'=>array(
					'name'=>$n,
					'parent_id'=>0
						)
					);
					if($this->Category->save($dat))
					{
		
						$this->redirect('managecategory');
					}
				}
			}
		public function admin_addscat()
			{
			$this->layout="dashboard";
			$this->loadModel('Category');
			$ct=$this->Category->find('list',array('conditions'=>array('Category.parent_id'=> 0),'fields'=>array('Category.id','Category.name')));
		//pr($ct);die;
			$this->set('ca',$ct);
			if($this->request->is('post'))
				{
		//pr($this->data);die;				
				//$idd=$this->data['Category']['Category'];
				$name=$this->data['name'];	
				$idd=$this->data['Category']['Sub'];
				//pr($name);die;
				//pr($idd);die;
				$daat=array(
					'Category'=>array(
					'name'=>$name,
					'parent_id'=>$idd
				));
				//pr($daat);die;
				if($this->Category->save($daat))
					{
						$this->redirect('mngsubcategory');
					}
				}
			}
			public function admin_managecategory()
		{
			$this->layout="dashboard";
			$this->loadModel('Category');
			$row=$this->Category->find('all',array('
					conditions'=>array('
						Category.parent_id'=>0)));
			if(!empty($this->data)){
   	 		
   	 		$name = $this->data['Category']['search'];
			$row = $this->Category->find('all',array('conditions'=>array("Category.name LIKE"=>"%$name%")));
			if(!empty($row))
			{
			}
			else echo"no result ";
			}
			$this->set('posts',$row);
		}
		public function admin_mngsubcategory()
		{
			$this->layout="dashboard";
			$this->loadModel('Category');
			$row=$this->Category->find('all',array(
						'conditions'=>array('
					Category.parent_id <>0')));
			if(!empty($this->data)){
   	 		
   	 		$name = $this->data['Category']['search'];
			$row = $this->Category->find('all',array('conditions'=>array("Category.name LIKE"=>"%$name%")));
			if(!empty($row))
			{
			}
			else echo"no result ";
			}
			
			//pr($row);die;
			$this->set('posts',$row);
			//pr($row);die;
		}
		public function deletecat()
		{	$val=$_POST;
			$this->loadModel('Category');
	        	$this->request->data['Category']['id'] =$val['id'];
	        	$this->request->data['Category']['status'] =1;
			//Configure::write('debug',2);
			$this->autoRender=false;
			//$this->layout='';
		
			//pr($val);die;
			#echo $val['id'];die;
			#echo $id;die;
		
		        #pr($this->data);die;
			if($this->Category->save($this->data))
			{
				echo $val['delid'];die;
			}else
				{
				echo "0";die;
				}
//	if($this->Category->updateAll(array('Category.status'=>'1'),array('Category.id'=>$val['id']))){ 
//			echo "yes";die;
//	}else{	
//	echo "No";die;
//	}
		}
		public function admin_editcat($id)	 
	 	{
	 		$this->layout="dashboard";
	 		$this->loadModel('Category');
               		 $post = $this->Category->findById($id);
               		 if (!empty($this->data)) 
               		 {
                  		$this->Category->id = $id;
		 		if ($this->Category->save($this->request->data))
		 		 {
                			 $this->Session->setFlash(__('Your post has been updated.'));
                    			return $this->redirect(array('action' => 'managecategory'));
                		}
      
                	}
                	else
                	{
				$this->request->data = $post;
		
			 }
		}
		
/******************************************Manage User*********************************/			
		public function admin_mnguser()
		{
			$this->layout="dashboard";
			$this->loadModel('User');
			$row=$this->User->find('all');
			if(!empty($this->data)){
   	 		
   	 		$name = $this->data['User']['search'];
			$row = $this->User->find('all',array('conditions'=>array("User.username LIKE"=>"%$name%")));
			if(!empty($row))
			{
			}
			else echo"no result ";
			}
			$this->set('usr',$row);
		}
		public function admin_addusr() {
		$this->layout="dashboard";	
		$this->loadModel('User');
		
		
			if(!empty($this->data))
			{
				$password=$this->data['User']['password'];
		
				$this->data['password']=md5($password);
				$this->User->save($this->data);
				$this->Session->setFlash("User is successfully Registered");
			}	
		
	}
		public function admin_useredit($id)	 
	 	{
	 		$this->layout="dashboard";
	 		$this->loadModel('User');
               		 $post = $this->User->findById($id);
               		 if (!empty($this->data)) 
               		 {
                  		$this->User->id = $id;
		 		if ($this->User->save($this->request->data))
		 		 {
                			 $this->Session->setFlash(__('Your post has been updated.'));
                    			return $this->redirect(array('action' => 'mnguser'));
                		}
      
                	}
                	else
                	{
				$this->request->data = $post;
		
			 }
		}
/***************************Manage Products**************************************************************/
 function viewproduct()
   	 {
   	 	$this->layout="user";
   	 	$rw= $this->Product->find('all',array('conditions'=>array('Product.user_id'=>$_SESSION['Auth']['User']['id'])));
   	 	//pr($rw);die;
   	 	

        $cnt = 0;
        foreach ($rw as $q):
           $cnt++;
$rw2[$cnt] = $this->Category->find('all', array('conditions' => array('Category.id' => $q['Product']['category_id'])));
           
       endforeach;
//pr($rw2);die;
        $this->set('rows', $rw);
       $this->set('rows2', $rw2);
    }
   	 
    
		
		
		function subcategory_fetcher()
		{
//pr($_POST);die;
$v=$_POST['id'];
			$this->layout=false;
			$this->autoRender=false;
			//pr($v);die;
			$this->loadModel('Category');
			$category=$this->Category->find('list',array('conditions'=>array(
												'Category.parent_id'=>$v),
											'fields'=>array(
												'Category.id','Category.name')));
						//	$category = $this->Category->find('list',array('conditions'=>array('Category.parent_id'=>$v)));
			#pr($category);die;
			/* there is one more way--using $this->render('/Elements/el');*/
			$cnt=0;
			foreach($category as $k=>$p):		
			$response[$cnt++]='<option value='.$k.'>'.$p.'</option>';
			endforeach;	
			$resp=implode('',$response);
			echo $resp;die;
		}
		function allprod()
		{
			$this->layout="user";
			#$id=$_SESSION['Auth']['User']['id'];
			#$r=$this->Product->find('all');
			# pr($r);die;
	 		//$this->set('post',$r);
    	#	$this->paginate['conditions'] = array('Product.user_id'=>$id);/* we can specify any particular condition too..
   	 		$data = $this->paginate('Product');
   			# pr($data);die;
   			 $this->set(compact('data'));
	 
	 		
		
		}
		
		
	function product()
	{
		$this->layout="user";
$this->loadModel('Category');
			$row=$this->Category->find('list',array('conditions'=>array('Category.parent_id'=>'0')));
					
						//pr($row);die;
			$this->set('cat',$row);	
			if(!empty($this->data))
			{
						#pr($_FILES);die;
					#pr($this->data);die;
           				if ($_FILES)
           				 {
           				 	
            				 $image=$this->data['Product']['image']['tmp_name'];
            				 $img=date("Y-m-d").'_'.$this->data['Product']['image']['name'];
            				 $this->request->data['Product']['image']=$img;
                	 		if($image)
                	 		{
                 				$this->SimpleImage->load($image);  
                 				//pr(WWW_ROOT);die;
                 				$this->SimpleImage->save(WWW_ROOT.'products/'.$img); 
                			 	$this->SimpleImage->square(100);
                 				$this->SimpleImage->save(WWW_ROOT.'thumb/'.$img);
                 			}             
           				}
					//pr($_FILES);die;
					#$img=date("Y-m-d").'_'.$this->data['Product']['image']['name'];
					#move_uploaded_file($image,"products/" . $img);
      				#$this->request->data['Product']['image']=$img;
   			 		//pr($this->data);die;
					$data=array(
						'name'=>$this->data['Product']['name'],
						'category_id'=>$this->data['Product']['Sub'],
						'user_id'=>$this->Auth->User('id'),
						'image'=>$this->data['Product']['image']
				);
			//pr($data);
						if($this->Product->save($data))
							{
								echo "Your Product is added";
								$this->Session->setFlash('Your Product is added dear!!');
								$this->redirect('viewproduct');
							}
						else {
								echo "Not Added!!!";
						}
						}
			
			
	}
	function editprod($id)
	{
			$this->layout="user";
	 		//$this->loadModel('Category');
	 		$row=$this->Category->find('list',array('conditions'=>array('Category.parent_id'=>'0')));
					
						//pr($row);die;
			$this->set('cat',$row);	
               		 $post = $this->Product->findById($id);
               		 if (!empty($this->data)) 
               		 {
                  		$this->Product->id = $id;
		 				if ($this->Product->save($this->request->data))
		 				 {
                			 $this->Session->setFlash(__('Your post has been updated.'));
                    			return $this->redirect(array('action' => 'viewproduct'));
                		}
      
                	}
                	else
                	{
				$this->request->data = $post;
		
			 }
	}
	
	public function deleteprod()
		{	$val=$_POST;
			//$this->loadModel('Category');
	        	$this->request->data['Product']['id'] =$val['id'];
	        	$this->request->data['Product']['status'] =1;
			//Configure::write('debug',2);
			$this->autoRender=false;
			//$this->layout='';
		
			//pr($val);die;
			#echo $val['id'];die;
			#echo $id;die;
		
		        #pr($this->data);die;
			if($this->Product->save($this->data))
			{
				echo $val['delid'];die;
			}else
				{
				echo "0";die;
				}
				}
				
                   
	
}
?>

