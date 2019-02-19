<!-- Sidebar -->

<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

<!--    Admin Functions -->

    <?php if ($this->session->userdata('type') == 'Admin'): ?>


    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-id-card"></i>
            <span>Users</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/userRegistration">Register User</a>
            <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/manageUser">Manage User</a>
            <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/assignUsers">Assign User Role</a>
          </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-id-card"></i>
            <span>Members</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/addStudent">Add Member</a>
            <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/importStudents">Import Member List</a>
            <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/manageMembershipRequests"> Membership Requests</a>
        </div>
    </li>

    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-id-card"></i>
            <span>Events</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/createEvent">Create Event</a>
              <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/viewEvents">View</a>
            <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/uploadEventDetails">Upload new</a>
          </div>
    </li>

    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-question"></i>
            <span>Forms and Questionnaire</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
              <a class="dropdown-item" href="<?php echo base_url();?>index.php/newform/createAForm">Create forms</a>
            <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/createQuestionnaire">Create questionnaire</a>
          </div>
    </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-users"></i>
                <span>Groups</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/mainGroups">Main groups</a>
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/subGroups">Sub groups</a>
            </div>
        </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>index.php/adminController/viewLogs">
            <i class="fas fa-landmark"></i>
            <span>Logs</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>index.php/adminController/generateReports">
            <i class="fas fa-pen"></i>
            <span>Reports</span></a>
    </li>

    <?php endif; ?>
<!--    Manager Functions-->
    <?php if ($this->session->userdata('type') == 'Manager'): ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-id-card"></i>
                <span>Users</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/userRegistration">Register User</a>
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/manageUser">Manage User</a>
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/assignUsers">Assign User Role</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-id-card"></i>
                <span>Students</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/addStudent">Add Student</a>
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/importStudents">Import Student List</a>
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/manageStudents">Manage Students</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-id-card"></i>
                <span>Events</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/createEvent">Create Event</a>
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/viewEvents">View</a>
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/uploadEventDetails">Upload new</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-question"></i>
                <span>Forms and Questionnaire</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/newform/createAForm">Create forms</a>
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/createQuestionnaire">Create questionnaire</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-users"></i>
                <span>Groups</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/mainGroups">Main groups</a>
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/subGroups">Sub groups</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>index.php/adminController/viewLogs">
                <i class="fas fa-landmark"></i>
                <span>Logs</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>index.php/adminController/generateReports">
                <i class="fas fa-pen"></i>
                <span>Reports</span></a>
        </li>


    <?php endif; ?>
<!--    Course Councilor-->
    <?php if ($this->session->userdata('type') == 'Course Councilor'): ?>



        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-question"></i>
                <span>Forms and Questionnaire</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/createQuestionnaire">Create questionnaire</a>
            </div>
        </li>



        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>index.php/adminController/viewLogs">
                <i class="fas fa-landmark"></i>
                <span>Logs</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>index.php/adminController/generateReports">
                <i class="fas fa-pen"></i>
                <span>Reports</span></a>
        </li>


    <?php endif; ?>
<!--    Telemarketing Executive-->
    <?php if ($this->session->userdata('type') == 'Telemarketing Executive'): ?>



        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-question"></i>
                <span>Forms and Questionnaire</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?php echo base_url();?>index.php/adminController/createQuestionnaire">Create questionnaire</a>
            </div>
        </li>



        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>index.php/adminController/viewLogs">
                <i class="fas fa-landmark"></i>
                <span>Logs</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>index.php/adminController/generateReports">
                <i class="fas fa-pen"></i>
                <span>Reports</span></a>
        </li>


    <?php endif; ?>



    <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>index.php/adminController/userRegistration">
            <i class="fas fa-id-card"></i>
            <span>User Registration</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>index.php/adminController/manageUser">
            <i class="fas fa-edit"></i>
            <span>Manage Users</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>index.php/adminController/createFormFields">
            <i class="fas fa-file"></i>
            <span>Create Form Fields</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>index.php/adminController/uploadEventDetails">
            <i class="fas fa-upload"></i>
            <span>Upload Event Details</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>index.php/adminController/createQuestionnaire">
            <i class="fas fa-question"></i>
            <span>Create Questionnaire</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>index.php/adminController/generateReports">
            <i class="fas fa-pen"></i>
            <span>Generate Reports</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>index.php/adminController/viewLogs">
            <i class="fas fa-landmark"></i>
            <span>View Log and Student Details</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>index.php/adminController/studentGroups">
            <i class="fas fa-file"></i>
            <span>Create Student Groups</span></a>
    </li> -->

</ul>