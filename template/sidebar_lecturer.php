<div class="container-fluid page-body-wrapper">
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item nav-profile">
          <div class="nav-link">
            <div class="user-wrapper">
              <div class="profile-image">
                <?php
                $lect_path='';
                  if($lecturer){
                    $lect_path = $lecturer->img_path;
                  }
                ?>
                <img src="<?php echo base_url($lect_path); ?>" alt="profile image">
              </div>
              <?php
                $users = $this->webSessionManager->getCurrentUserProp('user_type');
                $firstname = '';
                $lastname = '';
                if($users == 'lecturer'){
                  $firstname = ($lecturer->surname) ? $lecturer->surname : ' ';
                  $lastname = ($lecturer->firstname) ? $lecturer->firstname : ' ';
                }
              ?>
              <div class="text-wrapper">
                <p class="profile-name"><?php echo $firstname .' '.$lastname; ?></p>
                <div>
                  <small class="designation text-muted"><?php echo $this->webSessionManager->getCurrentUserProp('user_type'); ?></small>
                  <span class="status-indicator online"></span>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#users-dash" aria-expanded="false" aria-controls="users-dash">
            <i class="menu-icon mdi mdi-television"></i>
            <span class="menu-title">Dasboard</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="users-dash">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/lecturer/dashboard'); ?>">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle='modal' data-target='#center_modal_password'>Change Password</a>
              </li>
             <!--  <li class="nav-item">
                <a class="nav-link" href="<?php //echo base_url('vc/lecturer/profile'); ?>">Profile</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('vc/add/lecturer'); ?>">
            <i class="menu-icon mdi mdi-account-multiple"></i>
            <span class="menu-title">Personal Biodata</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#academic-set" aria-expanded="false" aria-controls="academic-set">
            <i class="menu-icon mdi mdi-school"></i>
            <span class="menu-title">Academics</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="academic-set">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/academic_appointment'); ?>">Academic Appointment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/university_education'); ?>">Education</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/qualifications'); ?>">Academic Qualification</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/professional_qualifications'); ?>">Professional Qualification</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#awards" aria-expanded="false" aria-controls="awards">
            <i class="menu-icon mdi mdi-trophy-award"></i>
            <span class="menu-title">Awards</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="awards">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/scholarships'); ?>">Scholarships</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/honours_distinctions'); ?>">Honours-Distinction</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/memberships'); ?>">Membership</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#teachings" aria-expanded="false" aria-controls="teachings">
            <i class="menu-icon mdi mdi-incognito"></i>
            <span class="menu-title">Details Of Teaching</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="teachings">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/work_experience'); ?>">Work Experience</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/lecturer/teaching_experience'); ?>">Teaching Experience</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/research_supervision'); ?>">Research Supervision</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/community_service'); ?>">Community Service</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#research" aria-expanded="false" aria-controls="research">
            <i class="menu-icon mdi mdi-file-presentation-box"></i>
            <span class="menu-title">Research</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="research">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/research_completed'); ?>">Completed</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/research_inprogress'); ?>">In Progress</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/project_thesis_dissertation'); ?>">Project-Dissertation and Thesis</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#publication" aria-expanded="false" aria-controls="publication">
            <i class="menu-icon mdi mdi-book-open-page-variant"></i>
            <span class="menu-title">Publication</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="publication">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/book_published'); ?>">Book Published</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/chapter_in_book_published'); ?>">Chapter in Books</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="<?php //echo base_url('vc/add/editors'); ?>">Editors</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/article_in_conference'); ?>">Article in Refereed Conference </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/patents_copyright'); ?>">Patents Copyrights </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/article_appear_in_journal'); ?>">Article appear in Journal </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/accepted_books'); ?>">Accepted Books for publication </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/technical_report'); ?>">Technical reports Monographs </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="menu-icon mdi mdi-text-to-speech"></i>
            <span class="menu-title">Conference</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/major_conf_attended'); ?>">Major Conference </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('vc/add/paper_read'); ?>"> Paper Read </a>
              </li>
            </ul>
          </div>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="<?php //echo base_url('vc/lecturer/best_publication'); ?>">
            <i class="menu-icon mdi mdi-library-books"></i>
            <span class="menu-title">Best Publications</span>
          </a>
        </li> -->
        <a class="btn btn-primary" href="<?php echo base_url('vc/lecturer/printApp'); ?>">Generate Report  <i class="mdi mdi-printer"></i></a>
      </ul>
  </nav>