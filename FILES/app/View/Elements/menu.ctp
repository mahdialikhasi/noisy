<ul id="nav-mobile" class="side-nav fixed right">
   	<li><div class="userView">
   		<?php echo $this->Html->image('navbar.jpg', array('class' => 'background')); ?>		
   		<a href="<?php echo $this->webroot ?>"><span class="white-text name">دست نوشته های یک تازه کار</span></a>
        <a href="<?php echo $this->webroot ?>"><?php echo $this->Html->image('logo.png', array('class' => 'logo')); ?></a>
   	</div></li>   	
   	<li><div class="divider"></div></li>
    <div class="links">
        <li class="bold"><a class="waves-effect waves-teal" href="<?php echo $this->webroot ?>">خانه</a></li>
        <li class="bold"><a class="waves-effect waves-teal" href="<?php echo $this->webroot ?>blogs">دست نوشته ها</a></li>
        <li class="bold"><a class="waves-effect waves-teal" href="<?php echo $this->webroot ?>books">کتاب</a></li>
        <li class="bold"><a class="waves-effect waves-teal" href="<?php echo $this->webroot ?>cv">رزومه</a></li>
        <li class="bold"><a class="waves-effect waves-teal" href="<?php echo $this->webroot ?>about">کیستم؟</a></li>
        <li class="bold"><a class="waves-effect waves-teal" href="<?php echo $this->webroot ?>contacts">ارتباط با من</a></li>
        <div class="divider"></div>
        <?php
          if ($role_id == 1) {
            ?>
              <li class="bold">
                <ul class="collapsible collapsible-accordion">
                  <li>
                    <a class="collapsible-header">مدیریت<i class="material-icons">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                      <ul>
                        <li class="bold"><a class="waves-effect waves-teal" href="<?php echo $this->webroot ?>blogs/lists/">مدیریت محتوا</a></li>
                        <li class="bold"><a class="waves-effect waves-teal" href="<?php echo $this->webroot ?>comments/lists/">نظرات</a></li>
                        <li class="bold"><a class="waves-effect waves-teal" href="<?php echo $this->webroot ?>contacts/lists/">تماس ها</a></li>
                        <li class="bold"><a class="waves-effect waves-teal" href="<?php echo $this->webroot ?>works/lists/">مدیریت نمونه کارها</a></li>
                        <li class="bold"><a class="waves-effect waves-teal" href="<?php echo $this->webroot ?>users">مدیریت کاربران</a></li>
                      </ul>
                    </div>
                  </li>
                </ul>          
              </li> 
            <?php
          }
        ?>
               
    </div>   	
</ul>