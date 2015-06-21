<?php
class UsersController extends AppController
{
	var $arr=array();
 	var $name = 'Users';
 	var $uses=array("User","Product",'Category','Chat','Message');
 	var $helpers=array('Html','Form','GoogleMap', 'Validation',
 										'Js' => array('JQuery'));
   	public $paginate = array(
       		 'limit' => 5,
        'order' => array(
            'Product.name' => 'asc'
        )
    );
   
   	
   	 
   	 public $components = array(
        'Session','Email',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'Users', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home')
        ),
        'SimpleImage'
    );
   	 
   	 function beforeFilter() {
        	$this->Auth->fields = array(
            		'username' => 'username',
            		'password' => 'password'
           		 );
           		 $this->Auth->allow('register','login','index','subcategory_fetcher','product');
           		 
		}
		public function validated() {

	}
    	public function login() {
    	$this->layout="admin";
    if ($this->request->is('post')) {
  
         if($this->Auth->login()) {
				$this->Session->write('uname',$this->Auth->User('username'));
				$this->Session->write('pwd',$this->Auth->User('password'));
				$sndr_ar=array_merge((array)$this->Session->read('sndr_ar'),(array)$_SESSION['Auth']['User']['id']);
				
      				$this->Session->write('sndr_ar',$sndr_ar);
      				$eml="aastha bhatia";
				 	 $this->Session->setFlash(('Data Saved Successfully'));
				 	
      			//	pr($this->Session->read('sndr_ar'));die;
			//	pr($this->Auth->User());die; 
            return $this->redirect($this->Auth->redirect('index'));
          //  pr($this->Auth->User);
          
        }
        $this->Session->setFlash(__('Invalid username or password, try again'));
    }
}
		public function profile()
		{
			//$this->layout="user";
			$this->render('/Elements/googlemap');
		}
		public function googlemap()
		{
		}
		
	public function fb() {

	}
	

   	 function logout() {
   	 		$this->Session->destroy();
        	$this->redirect($this->Auth->logout($this->redirect('login')));
    	}
 
	public function register() {
	$this->layout="user";
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->Email->from= 'Admin <aastha@gmail.com>';
					$this->Email->to=$this->data['User']['email'];
					$this->Email->template = 'default';
					$this->Email->sendAs = 'both'; 
					$this->Email->subject = 'Confirmation';
					$this->Email->attachments = array(
    								TMP . 'sDirectAssignment.docx',
    								'bar.doc' => TMP . 'sDirectAssignment.docx'
								);
					$this->set('eml', $eml);
					#pr($this->Email);die;
					$this->Email->send('Congrats!');
                return $this->redirect(array('action' => 'login'));
            }
            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
        }
    }
    function index(){
    		$this->autoRender=false;
    	$this->redirect(array('action'=>'about_us','controller'=>'Contents'));
   	 }
   	 /********************conversation**************************************************/
   	 public function chatuser()
   	 {
   	 	$this->layout="user";
   	 	//$result=$this->Chat->find('all');
   	 	//$this->set('posts',$result);
   	 	
   	 	$posts = $this->paginate('User');
   	 	
   	 	$this->set(compact('posts'));
   	 }
   	 public function conversation()
   	 {
   	 	//$this->layout="user";
   	 	$this->autoRender=false;
		
		$s_id=$_SESSION['Auth']['User']['id'];
		
		$r_id=$_POST['rcvr'];
		//pr($r_id);die;
		if(!empty($_POST))
		{
		//pr($_POST);die;
			$data = array(
          			 'Message' => array(
          			 'sender'=>$s_id,
          			 'receiver'=>$r_id,
                        	'message'=>$_POST['msg']
         	              
          				 )
       					 );
			if($this->Message->save($data,false,array('sender','receiver','message')))
			{
				  $this->Session->setFlash(('Data Saved Successfully'));
				  $this->redirect('convo');
			}
		}
	    	
	   
	 }
   	 
   	 public function convo($id,$rname)
   	 {
   	 	$this->layout="user";
   	 	//pr($rname);die;
   	 	$this->Session->write('rname',$rname);
   	 
		$rcvr_ar=array_merge((array)$this->Session->read('rcvr_ar'),(array)$id);
      		$this->Session->write('rcvr_ar',$rcvr_ar);
		$this->set('id',$id);
	  }
	  public function mmsgg()
	 {
	// pr($_SESSION);die;
	  $s=$_SESSION['sndr_ar'];
	  
		$r=$_SESSION['rcvr_ar'];
		$options['conditions']['OR']['0']=array("Message.receiver"=>$s,"Message.sender"=>$r);
	    			$options['conditions']['OR']['1']=array("Message.receiver"=>$r,"Message.sender"=>$s);
	    	
		$data=$this->Message->find('all',$options,array(
			'order' => array('Message.id DESC')));
		return $data;
	    
   	 	
   	 
   	 }
   	 public function delconvo()
   	 {
   	 $this->autoRender=false;
   	// pr($_POST);die;
   	 $this->Message->deleteAll(array('Message.id'=>$_POST['id'],'Message.sender'=>$_SESSION['Auth']['User']['id']));
    }
    
   	 /*******view ,add ,delete,list and edit product ********************************/ 
   	 public function detail_yo()
	   	{	
	   		$r=$this->Product->find('first',array('conditions'=>array('Product.id'=>$_POST['id'])));
	   				//pr($r);die;
		  
			echo json_encode($r['Product']);die;
	   		
	   }
	   
   	 function viewproduct()
   	 {
   	 	$this->layout="user";
   	 	$rw2=array();
   	 	//pr($_SESSION['Auth']['User']['id']);
   	 	$rw= $this->Product->find('all',array('conditions'=>array('Product.user_id'=>$_SESSION['Auth']['User']['id'])));
   	 	if(!empty($rw))
   	 	{
   	 	

        $cnt = 0;
        foreach ($rw as $q):
           $cnt++;
$rw2[$cnt] = $this->Category->find('all', array('conditions' => array('Category.id' => $q['Product']['category_id'])));
           
       endforeach;
//pr($rw2);die;
        $this->set('rows', $rw);
       $this->set('rows2', $rw2);
       }
       
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
			$cnt=1;
			$k="";
			$p="---select---";
			$response[0]='<option value='.$k.'>'.$p.'</option>';
			foreach($category as $k=>$p):		
			$response[$cnt++]='<option value='.$k.'>'.$p.'</option>';
			endforeach;	
			$resp=implode('',$response);
			
			echo $resp;die;
		}
		function allprod()
		{
			$this->layout="user";
			$data = $this->paginate('Product');
			$this->loadModel('Category');
			$row=$this->Category->find('list',array('conditions'=>array('Category.parent_id'=>'0')));
					
						//pr($row);die;
			$this->set('cat',$row);	
			
			#$id=$_SESSION['Auth']['User']['id'];
			#$r=$this->Product->find('all');
			# pr($r);die;
	 		//$this->set('post',$r);
    	#	$this->paginate['conditions'] = array('Product.user_id'=>$id);/* we can specify any particular condition too..
    		if(!empty($this->data)){
   	 		
   	 		$name = $this->data['Product']['search'];
			$data = $this->Product->find('all',array('conditions'=>array("Product.name LIKE"=>"%$name%")));}
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
						'image'=>$this->data['Product']['image'],
						'price'=>$this->data['Product']['price']
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
	
	public function deletepro()
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
				
		public function purchase()
		{
			$this->autoRender=false;
			//pr($_POST);die;
			$cnt=$_POST['count'];
			
			//$this->Session->write('cart',$_POST['cart']);
			$arr=array_merge(array($this->Session->read('cart')),array($_POST['cart']));
			if($this->Session->write('cart',$arr))
				{
					$cnt=CakeSession::read('count');
					//echo "hi";die;
			$result=$this->Product->find('first',array('conditions'=>array('Product.id'=>$_POST['cart'])));
					//echo "hi";die;
					//pr($result);die;
					//pr($arr);die;
					$cnt++;
    				$this->Session->write('count',$cnt);
    				//$this->Session
    				//pr($result);
    				$this->tp=$this->tp+$result['Product']['price'];
    				//echo ($this->tp);
	   				$this->Session->write('total',$this->tp);
    				$r=json_encode($result );
    			echo $r;die;
    			}
    		else
    			echo 0;die;
    	}
			//$this->Session->write('',$_POST[cart]);
			//pr($arr);die;
			
			public function unpurchase()
		{	$this->autoRender=false;
				$m=$_POST['cart'];		
				$arr1=$this->Session->read('cart');
				array_filter($arr1, $m);
						
				//$this->Session->destroy
		}
		public function search()
		{
			$this->layout="user";
			$this->loadModel('Category');
			$row=$this->Category->find('list',array('conditions'=>array('Category.parent_id'=>'0')));
			$this->set('cat',$row);
			$row2=$this->User->find('list',array('fields'=>'User.username '));
			$this->set('usr',$row2);
				
		}
		//$m[]=array();
		public function searchin()
		{
			$this->layout=false;
			$this->autoRender=false;
			$p=$_POST;
			//pr($_POST);die;
			//pr($this->Product->find('all'));die;
			if($_POST['ajx']=="user")
			{
			
			$r = $this->Product->find('all',array('conditions'=>array(
									'Product.user_id'=>$_POST['userid'],
								'Category.parent_id LIKE'=>"%".$_POST['catid']."%",
								'Product.category_id LIKE'=>"%".$_POST['subcat']."%",
								'Product.name LIKE'=>"%".$_POST['product']."%")));
		
			}
			else if($_POST['ajx']=='category')
			{
			$r=$this->Product->find('all',array('conditions'=>array(
								'Product.user_id LIKE'=>"%".$_POST['userid']."%",
								'Category.parent_id LIKE'=>"%".$_POST['catid']."%",
								'Product.category_id LIKE'=>"%".$_POST['subcat']."%",
								'Product.name LIKE'=>"%".$_POST['product']."%")));
		
			}
			else if($_POST['ajx']=='subcategory'){
				$r=$this->Product->find('all',array('conditions'=>array(
								'Product.user_id LIKE'=>"%".$_POST['userid']."%",
								'Category.parent_id LIKE'=>"%".$_POST['catid']."%",
								'Product.category_id LIKE'=>"%".$_POST['subcat']."%",
								'Product.name LIKE'=>"%".$_POST['product']."%")));
				
			}
			else if($_POST['ajx']=='product')
			{
				$r=$this->Product->find('all',array('conditions'=>array(
								'Product.user_id LIKE'=>"%".$_POST['userid']."%",
								'Category.parent_id LIKE'=>"%".$_POST['catid']."%",
								'Product.category_id LIKE'=>"%".$_POST['subcat']."%",
								'Product.name LIKE'=>"%".$_POST['product']."%")));
			}
	
			$this->set(compact('r'));
			$this->render('/Elements/ajaxsearch');
			
		}
}
?>

