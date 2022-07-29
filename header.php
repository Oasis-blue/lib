<?php

include("exfix.php");

?>

  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<script src="https://kit.fontawesome.com/106f5920d2.js" crossorigin="anonymous"></script>
<style>
@media (max-width:997px){

/* Division */
.bc{
 overflow:auto;
 flex-wrap:wrap;
}

}

@media (max-width:640px){

/* Paragraph */
.bc p{
 align-self:flex-start;
}

}
@media (max-width:1044px){

/* Division */
.up{
 align-items:center;
 flex-wrap:wrap;
 justify-content:space-between !important;
}

}

@media (max-width:903px){

/* Division */
.up{
 justify-content:space-around !important;
}

}

@media (max-width:828px){

/* Division */
.up{
 flex-wrap:nowrap;
}

}

@media (max-width:700px){

/* Division */
.up{
 display:grid !important;
 align-content:center;
 grid-template-columns:auto 1fr 1fr !important;
 justify-content:normal !important;
}

}

@media (max-width:561px){

/* Division */
.up{
 display:inline-grid;
 transform:translatex(0px) translatey(0px);
 justify-content:center !important;
 grid-template-columns:1fr 1fr 1fr !important;
 grid-template-rows:auto 1fr !important;
}

}

@media (max-width:487px){

/* New created breakpoint. */

}

@media (max-width:474px){

/* Division */
.up{
 display:flex !important;
 justify-content:normal !important;
 transform:translatex(0px) translatey(0px);
}

}

@media (max-width:471px){

/* New created breakpoint. */

}

@media (max-width:458px){

/* Division */
.up{
 flex-direction:column;
 align-items:center;
 display:grid !important;
 align-content:space-around;
 justify-content:space-around !important;
 grid-template-rows:1fr !important;
 grid-template-columns:1fr 1fr;
}

}

@media (max-width:440px){

/* Division */
.up{
 display:flex !important;
 justify-content:space-between !important;
 align-items:flex-end;
}

}

@media (max-width:390px){

/* Division */
.up{
 align-items:center;
}

}

@media (max-width:372px){

/* Division */
.up{
 display:flex !important;
}

}

@media (max-width:762px){

 /* Division */
 .up{
  flex-wrap:wrap !important;
 }
 
}

@media (max-width:660px){

 /* Form Division */
 .gen div form{
  flex-direction:column;
 }
 
}

@media (max-width:440px){

 /* Division */
 .up{
  flex-wrap:nowrap !important;
 }
 
}

@media (max-width:421px){

 /* Logo */
 .menu a img{
  width:195px;
 }
 
}

@media (max-width:331px){

 /* New created breakpoint. */
 
}
@import url("//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

*{
  box-sizing: border-box;
}
body{
  font-family: 'poppins';
}


  /* Table Row (hover) */
.doit tbody tr:hover{
 background-color:#bdc3c7;
}
.doit tbody td:hover{
 background-color:rgba(236,240,241,0.74);
}

/* Import Google Fonts */
@import url("//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

/* Sses */
.sses{
 display:flex;
 justify-content:center;
 align-items:center;
 flex-direction:column;
 font-family:'Poppins', sans-serif;
}

/* Form Division */
.sses form{
 transform:translatex(0px) translatey(0px);
 display:flex;
}

/* Lookre */
.sses form .lookre{
 font-size:16px;
}

/* Lookret */
#lookret{
 font-size:19px;
}

/* Label */
.sses form label{
 font-size:19px;
 font-family:'Poppins', sans-serif;
}

/* Lookre (hover) */
.sses form .lookre:hover{
 background-color:#1abc9c;
 border-color:#1abc9c;
}


/* Import Google Fonts */
@import url("//fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

/* Form Division */
.alr .fm form{
 display:flex;
 justify-content:center;
 align-items:center;
 flex-direction:column;
 font-size:19px;
 font-family:'Nunito Sans', sans-serif;
 transform:translatex(0px) translatey(0px);
}

/* Input */
.fm p input[type=number]{
 font-size:18px;
}

/* Appro */
.fm form .appro{
 font-size:18px;
 background-color:#27ae60;
 color:#f7f7f7;
 border-color:#2ecc71;
 border-top-right-radius:5px;
 border-bottom-left-radius:5px;
 border-bottom-right-radius:5px;
 border-top-left-radius:5px;
}

/* Appro (hover) */
.fm form .appro:hover{
 background-color:#2ecc71;
 border-color:#27ae60;
 cursor: pointer;
}



.ab {
  border-collapse: collapse; /* Collapse borders */
  width: 100%; /* Full-width */
  border: 1px solid #ddd; /* Add a grey border */
  font-size: 18px; /* Increase font-size */
}

.ab th, .ab td {

  padding: 12px; /* Add padding */
}

.ab tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd;
}




/* Apr */
.ab tr .apr{
 background-color:#27ae60;
 color:#f1f1f2;
}

/* Deny */
.ab tr .deny{
 background-color:#e74c3c;
 color:#ffffff;
}

/* Deny (hover) */
.ab tr .deny:hover{
 background-color:#ecf0f1;
 color:#e74c3c;
}

/* Apr (hover) */
.ab tr .apr:hover{
 color:#27ae60;
 background-color:#ecf0f1;
}

/* Import Google Fonts */
@import url("//fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

/* Paragraph */
.alr .alrt p{
 text-align:center;
 font-family:'Nunito Sans', sans-serif;
 font-size:19px;
 font-weight:500;
}


/* Import Google Fonts */
@import url("//fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

/* Division */
.bc{
 display:flex;
 flex-direction:column;
 align-items:center;
 justify-content:center;
 font-family:'Nunito', sans-serif;
 font-size:17px;
 text-align:center;
}

/* Table Data */


/* Th */


/* Link */
.ab tr a{
 padding-left:8px;
 padding-right:8px;
 border-top-left-radius:5px;
 border-top-right-radius:5px;
 border-bottom-left-radius:5px;
 border-bottom-right-radius:5px;
 border-style:solid;
 border-width:1px;
}










.sug{cursor: pointer;}
/* Division */
div .vv{
 width:507px;
 display:flex;
 flex-direction:column;
 align-items:center;
}

/* Inp */
.inp{
 font-size:1.2em;
}

/* Sell */
.sell{
 font-size:1em;
}

/* Sug */
.vv form .sug{
 font-size:1em;
}

/* Add */
#add{
 width:100% !important;
}

/* Label */
.vv form label{
 font-weight:500;
}

@media (max-width:474px){

 /* Division */
 div .vv{
  width:316px;
 }
 
}

@media (max-width:441px){

 /* New created breakpoint. */
 
}

/* Paragraph */
center form p{
 background-image:url("https://images.unsplash.com/photo-1567473030492-533b30c5494c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNTc5fDB8MXxzZWFyY2h8Mnx8c2VuZHxlbnwwfHx8fDE2NTgyNjYwMzM&ixlib=rb-1.2.1&q=80&w=2560");
 background-position-y:47%;
 background-size:cover;
 color:rgb(0, 0, 0);
 background-attachment:scroll;
}

/* Doit */
.doit{
 background-color:rgba(240,239,239,0.71);
}

/* Paragraph */
.shead p{
 color:#ffffff;
}







/* Import Google Fonts */
@import url("//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

/* Paragraph */
.nn{
 max-width:51vw;
 font-family:'Poppins', sans-serif;
 text-align:center;
 font-size:16px;
}




/* Import Google Fonts */
@import url("//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

/* Paragraph */
.nm{
 font-family:'Poppins', sans-serif;
 font-size:2em;
 font-weight:500;
}

/* Sugg */
center .nm .sugg{
 font-family:'Poppins', sans-serif;
 font-size:1em;
 cursor:pointer;
}

/* Sugg (hover) */
center .nm .sugg:hover{
 background-color:#72c0f7;
}



.y form .reqrad{
 padding-left:12px;
 padding-right:12px;
 padding-top:12px;
 padding-bottom:12px;
cursor: not-allowed;
 font-size:16px;
background-color: #f0f0f0;
}





/* Reqr */
.y form .reqr{
 padding-left:12px;
 padding-right:12px;
 padding-top:12px;
 padding-bottom:12px;
 border-width:2px;
 border-style:solid;
 border-color:#34b61a;
 font-size:16px;
 border-top-left-radius:5px;
 border-top-right-radius:5px;
 border-bottom-left-radius:5px;
 border-bottom-right-radius:5px;
 background-color:#27ae60;
 color:#ffffff;
 cursor: pointer;
}
/* Reqr (hover) */
.y form .reqr:hover{
 background-color:rgba(46,204,113,0.84);
}


/* Division */
.holder center .y{
 background-color:rgba(31,219,223,0.38);
 background-image:none;
}


/* Division */
.holder .y{

 width:50%;
 border-top-right-radius:22%;
 border-bottom-left-radius:22%;
}


/* Colo */
.colo{
 background-color:#025859;
}

/* Link */
.colo center a{
 color:#5fe7de;
 font-family:'Poppins',sans-serif;
 text-decoration:underline;
}

/* Paragraph */
.colo center p{
 color:#f1c40f;
 font-family:'Poppins'Arial,'Helvetica Neue',Helvetica,sans-serif;
}






/* Table Data */
.tbb tbody td{
 border-bottom-style:solid;
 border-bottom-width:1px;
}


/* Table */
.tbb{
 font-family:'Poppins',sans-serif;
 font-size:17px;
 transform:translatex(0px) translatey(0px);
}

/* Table Data */
.tbb tbody .tdd{
 border-right-style:solid;
 border-right-width:1px;
 border-bottom-style:solid;
 border-bottom-width:1px;
}

/* Th */
.tbb tbody .thh{
 border-right-style:solid;
 border-right-width:1px;
 border-bottom-style:solid;
 border-bottom-width:1px;
}



.holder .clicker{


 font-family:'Poppins',sans-serif;
 display:flex;
 justify-content:center;
 align-items:center;

}
/* Clicker */
.holder form .clicker{
 font-size:18px;

 font-family:'Poppins',sans-serif;
 display:flex;
 justify-content:center;
 align-items:center;

}
.clicker h1{
  font-family:'Poppins',sans-serif;

}


/* Req */
.req{
 background-color:#14bfcc;
 width:10%;

 font-size:18px;
 border-style:solid;
 border-width:1px;
 padding-top:1%;
 padding-bottom:1%;
 cursor: pointer;
}

/* Req (hover) */
.req:hover{
 background-color:#5182cc;
}

/* Input */
.cop{
 width:4%;
 height:6vh;
 font-size:18px;
}


/* Label */
.table .tr label{
 font-weight:600;
 font-family:'Poppins',sans-serif;
}

/* Fname */
#fname{
 height:2em; font-size:16px;
}

/* Sname */
#sname{
 height:2em; font-size:16px;
}

/* Phone */
#phone{
 height:2em; font-size:16px;
}

/* Email */
#email{
 height:2em;
 font-size:16px;
}

/* Pin */
#pin{
 height:2em; font-size:16px;
}

/* Pinn */
#pinn{
 height:2em; font-size:16px;
}

/* Sign */
.table .tr .sign{
 background-color:rgba(23,86,246,0.85);
 border-style:none;
 font-size:16px;
 padding-left:10px;
 padding-right:10px;
 padding-top:4px;
 padding-bottom:4px;
 border-top-left-radius:5px;
 border-top-right-radius:5px;
 border-bottom-left-radius:5px;
 border-bottom-right-radius:5px;
 color:#f2f1f1;
}

/* Sign (hover) */
.table .tr .sign:hover{
 background-color:#053dcb;
 cursor: pointer;
}





.mmm{color: red;}
.cls:hover,.cls:focus{font-size: 2vw; cursor: pointer;}
  body {
    margin: 0;
  }

  .tabb {
    height: 130vh;
  }



  .two {
    background-color: white;
  }

  .se {
    color: white;
  }

  <?php
$stories=array(

"photo.jpg",
"1.jpg",
"2.jpg",
"3.jpg",
"4.jpg",
"5.jpg",
"6.jpg",
"7.jpg",
"9.jpg",
"8.jpg",
"10.jpg",
"11.jpg",
"12.jpg",
"13.jpg",
"14.jpg",
"15.jpg",
"16.jpg",
"17.jpg",
"18.jpg",
"19.jpg",
"20.jpg",
"21.jpg",
"22.jpg",
"23.jpg"
);
$dis= array_rand($stories,1);?>
  .bod {
    background-image: url("<?php  echo $stories[$dis]  ?>");
    background-size: cover;

  }
/* Aaaa */
#aaaa{
 height:60vh;
 display:flex;
 justify-content:center;
 align-items:center;
}
#bbbc{


 background-color:#f1eeee;
 box-shadow:0px 0px 17px 3px #9a9292;
}
/* Division */
.tr{
 display:flex;
 align-content:normal;
 justify-content:space-around;
 column-gap:65px;
}

/* Division */

/* Bbbc */
#bbbc{
 display:flex;
 justify-content:center;
 align-items:center;
}


/* Bbbb */
#bbbb{
 width:30%;
 height:50vh;
 background-color:#f1eeee;
 box-shadow:0px 0px 17px 3px #9a9292;
}


  /*
.bod{background-color: lightslategrey;}*/

  /* Import Google Fonts */
  @import url("//fonts.googleapis.com/css2?family=TimesNewRoman:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

  /* Flink */
  .flink {
    text-decoration: none;
    color: #ffffff;  font-weight: 800;
    font-family: 'Poppins';
    font-size: 1em;
    margin: 0 1rem;
  }

  /* Division */


/* Form Division */
#aaaa #bbbb .looo{
 width:79% !important;
}

/* Bbbb */
#bbbb{
 display:flex;
 justify-content:center;
 align-items:center;
}

/* Input */

/* Input */
#id{
 transform:translatex(0px) translatey(0px);
}

/* Pak */
.pak{
 width:100% !important;
}

/* Idk */
.idk{
 width:100% !important;
}


  /* Flink (hover) */
  .flink:hover {
    opacity: 0.75;
    color: #19ebdd;
  }


/* Division */
.up{
 background-color:#176357;
 display:flex;
 justify-content:center;
 overflow: auto;
}


















.toggle{
  display: none;
}
  .logo {
    width: 233px;
    padding: 7.5px 10px 7.5px 0;
  }
.item{
padding: 10px;

}



  a {
    text-decoration: none;
  }

  nav {
   
    background-color:#ecf0f1;
    padding: 0 15px;
  }

.menu {
    display: flex;
    list-style-type: none;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
  }
  @media (max-width:1044px){

/* New created breakpoint. */
.toggle{
  display: block;
}

 .menu li a{
  display: block;
  padding: 15px 5px;
 }
.toggle{
  order: 1;
  font-size: 20px;
}

.item.button{
  order: 2;
}
.item{
  order: 3;
  width: 100%;
  text-align: center;
  display: none;
}
.active .item{

 display: block;
}

.button.secondary{
  border-bottom: 1px black solid;
}}

  .navlink {
cursor: pointer;
    font-family: 'Poppins', sans-serif;
    font-weight: 800;
    color: black;
  }

  .navlink:hover {
    background-color:#c1bdbd;
 border-top-left-radius:12px;
 border-top-right-radius:12px;
 border-bottom-left-radius:12px;
 border-bottom-right-radius:12px;

  }


  .sear {
    display: flex;
    justify-content: center;
    align-items: center;
  }


  /* Searchbox */
  .searchbox {
    height: 27px;
    font-size: 16px;
    margin-left: 11px;
  }

  /* Input */
  .tabb tbody .se td .sear input[type=text] {
    height: 31px;
    width: 30% !important;
  }

  /* SearchUnknown */
  .searchselect {
    height: 33px;
    width: 5%!important;
    font-size: 16px;
  }

  /* Label */
  .se td label {
    font-family: 'Poppins';
    margin-left: 19px;
  }

  /* Searchbtn */
  .se td .searchbtn {
    background-color: #f3fd29;
    border-style: none;
    height: 29px;
    cursor: pointer;
  }

  .se td .searchbtn:hover {
    background-color: #6df41a;
  }

  /* Table Row */
  .se {
    background-color: #025859;
  }















  /* Dropdown Button */


  /* The container <div> - needed to position the dropdown content */
  .dropdown {
    position: relative;
    display: inline-block;
  }

  /* Dropdown Content (Hidden by Default) */
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }
/* Show */
.menu li .show{
 flex-direction:column;
 padding-left:13px;
 padding-right:11px;
}


  /* Links inside the dropdown */
  .dropdown-content a {
    font-family: 'Poppins', sans-serif;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  /* Change color of dropdown links on hover */
  .dropdown-content a:hover {
    background-color: #ddd;
  }

  /* Show the dropdown menu on hover */
  .dropdown:hover .dropdown-content {
    display: block;
  }

  /* Change the background color of the dropdown button when the dropdown content is shown */
  .dropdown:hover .navlink {
    background-color:#c1bdbd;
 border-top-left-radius:12px;
 border-top-right-radius:12px;
 border-bottom-left-radius:12px;
 border-bottom-right-radius:12px;
 
  }

  nav .menu .item:hover{

    background-color:#c1bdbd;
 border-top-left-radius:12px;
 border-top-right-radius:12px;
 border-bottom-left-radius:12px;
 border-bottom-right-radius:12px;
  }

  /* Import Google Fonts */
  @import url("//fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

  /* Paragraph */
  .qu {
    text-align: center;
    font-family: 'Poppins', serif;
    font-size: 19px;
    margin-top: 0px;
    margin-bottom: -14px;  font-weight: 800;
  }

  .dropdown2 {
    position: relative;
    display: inline-block;
  }

  .dropdown-content2 {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 230px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  .dropbtn {
    font-family: 'Poppins', sans-serif;
    background: none;
    color: black;
    padding: 1px;
    font-size: 16px;  font-weight: 800;
    border: none;
    cursor: pointer;
  }

  /* Dropdown button on hover & focus */
  .dropbtn:hover,
  .dropbtn:focus {
    background-color:#c1bdbd;
 border-top-left-radius:12px;
 border-top-right-radius:12px;
 border-bottom-left-radius:12px;
 border-bottom-right-radius:12px;

  }

  .show {
    display: flex;
  }

  /* Dropdown content2 */
  .dropdown-content2 {
    min-height: 283px;

    justify-content: center;
    font-size: 1em;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
  }

  /* Input */
  #id {
    height: 2em;
    font-size: 1em;
  }

  /* Pass */
  #pass {
    font-size: 1em;
    height: 2em;
  }

/* Fooo */

/* Bbbb */
#bbbc{
 width:45% !important;
}
/* Show */
.menu li .show3{
 flex-direction:column;
 padding-left:13px;
 padding-right:11px;
}



  /* Form Division */
  .dropdown2  .looo {
    height: 95%;
    position: relative;
    top: 2em;
  }

  .login {

    cursor: pointer;
  }

  /* Login */
  .dropdown2 form .login {
    width: 100%;
    height: 2em;
    background-color: #018192;
    color: #ffffff;
    border-style: none;
  }

  /* Login (hover) */
  .dropdown2 form .login:hover {
    background-color: #03d0ec;
  }

 

  .dropdown3 {
    position: relative;
    display: inline-block;
  }

  .dropdown-content3 {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 230px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  .dropbtn3 {
    font-family: 'Poppins', sans-serif;
    background: none;  font-weight: 800;
    color: black;
    padding: 1px;
    font-size: 16px;
    border: none;
    cursor: pointer;
  }

  /* Dropdown button on hover & focus */
  .dropbtn3:hover,
  .dropbtn3:focus {
    background-color:#c1bdbd;
 border-top-left-radius:12px;
 border-top-right-radius:12px;
 border-bottom-left-radius:12px;
 border-bottom-right-radius:12px;
 padding-left:5px;
 padding-right:5px;
 padding-top:2px;
 padding-bottom:2px;;
  }

  .show3 {
    display: flex;
  }

  /* Dropdown content2 */
  .dropdown-content3 {
    min-height: 283px;

    justify-content: center;
    font-size: 1em;
    font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
    font-weight: 600;
  }

  /* Input */
  #id3 {
    height: 2em;
    font-size: 1em;
  }

  /* Pass */
  #pass3 {
    font-size: 1em;
    height: 2em;
  }

  /* Form Division */
  .dropdown3 form {
    
    position: relative;
    top: 2em;
  }

  .login3 {

    cursor: pointer;
  }

  /* Login */
  .dropdown3 form .login3 {
    width: 100%;
    height: 2em;
    background-color: #018192;
    color: #ffffff;
    border-style: none;
  }

  /* Login (hover) */
  .dropdown3 form .login3:hover {
    background-color: #03d0ec;
  }


















  
</style>
<link rel="stylesheet" href="cdnjs.cloudfare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
<script>


  function myFunction() {
    document.getElementById("myDropdown2").classList.toggle("show");
  }

  // Close the dropdown menu if the user clicks outside of it
  /* window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content2");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  } 
  document.getElementById("myDropdown2").onclick= function(events){

  document.getElementById("myDropdown2").classList.toggle("show");

  }*/


  function myFunctionn() {
    document.getElementById("myDropdown3").classList.toggle("show3");
  }

</script>
<script>


var mmm=document.getElementById("mmm");



var cls=document.getElementsByClassName("cls")[0];


cls.onclick=function(){mmm.style.display="none";}
window.onclick=function(event){if(event.target ==modal){mmm.style.display="none";}}




  </script>

        
         

    <!--  <div class="dropdown2">



            <a class="flink"><button onclick="myFunction()" class="dropbtn"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                  <g>
                    <rect fill="none" height="24" width="24" />
                  </g>
                  <g>
                    <g>
                      <path d="M12,2C6.48,2,2,6.48,2,12s4.48,10,10,10s10-4.48,10-10S17.52,2,12,2z M7.35,18.5C8.66,17.56,10.26,17,12,17 s3.34,0.56,4.65,1.5C15.34,19.44,13.74,20,12,20S8.66,19.44,7.35,18.5z M18.14,17.12L18.14,17.12C16.45,15.8,14.32,15,12,15 s-4.45,0.8-6.14,2.12l0,0C4.7,15.73,4,13.95,4,12c0-4.42,3.58-8,8-8s8,3.58,8,8C20,13.95,19.3,15.73,18.14,17.12z" />
                      <path d="M12,6c-1.93,0-3.5,1.57-3.5,3.5S10.07,13,12,13s3.5-1.57,3.5-3.5S13.93,6,12,6z M12,11c-0.83,0-1.5-0.67-1.5-1.5 S11.17,8,12,8s1.5,0.67,1.5,1.5S12.83,11,12,11z" />
                    </g>
                  </g>
                </svg></button></a>

            <div id="myDropdown2" class="dropdown-content2">
              <form method="POST">
                <label for="id">Library card no.:<br></label><input type="number" name="id" id="id" class="id" placeholder="Enter your library number">
                <br>
                <br>
                <label for="pass">PIN:<br></label><input type="password" name="pass" id="pass" class="pass" placeholder="Enter your pin">
                <br>
                <br>
                <input type="submit" name="login" class="login" value="Login">


              </form>
            </div>
          </div>
-->

      

     
    


        <nav>
          
          <ul class="menu">
<li><a href="index.php"> <img class="logo" src="logoo.png"></a></li>
          <?php echo $logout ?? '' ?>
 <?php echo $adlog ?? ""; echo $vie ?? ""; ?>





<?php echo $userlog ?? "";?>



           <?php echo $getlibcard; ?>


            <li class="item has-submenu">

              <div class="dropdown">
                <a tabindex="0" class="navlink">BOOKS</a>
                <div class="dropdown-content">
                <a href="content.php?retp=books">ALL BOOKS</a>
                  <a href="content.php?retp=audb">AUDIOBOOKS</a>
                  <a href="content.php?retp=txtb">TEXTBOOKS</a>
                  <a href="content.php?retp=hndt">HAND-OUTS</a>
                  <a href="content.php?retp=lit">LITERATURE</a>
                  <a href="content.php?retp=enc">ENCYCLOPEDIA</a>
                  
                </div>
              </div>


            </li>

            <li class="item has-submenu">

<div class="dropdown">
  <a  class="navlink">OTHER RESOURCES</a>
  <div class="dropdown-content">
    <a href="content.php?retp=arti">ARTICLES/JOURNALS</a>
    <a href="content.php?retp=resh">ONGOING RESEARCH</a>
    <a href="content.php?retp=news">NEWSPAPERS/MAGAZINES</a>
    <a href="content.php?retp=phot">PHOTO LIBRARY</a>
    <a href="content.php?retp=psq">PAST QUESTIONS</a>
    <a href="content.php?retp=othe">OTHER PUBLICATIONS</a>
  </div>
</div>


</li>

<li class="item"><a href="content.php?retp=vid" class="navlink">VIDEOS</a></li>

<li class="item"><a href="authors.php" class="navlink">AUTHORS</a></li>



        
          <?php echo $reqq ?? "" ?>


          <li class="toggle"><a href="#"><i class="fas fa-bars"></i><!--&#9776;--></a></li>


          </ul>

        </nav>
   
     





        <div class="up">
         

        <?php if(isset( $bottom7 )){ echo $bottom7 ; }?>   
        <?php if(isset( $bottom4 )){ echo $bottom4 ; }?>   
        <?php if(isset( $bottom3)){ echo $bottom3 ;} ?>
<?php if(isset($bottom1)){ echo $bottom1; } ?>
<?php if(isset( $bottom2)){ echo $bottom2; } ?>
<?php if(isset($notif)){ echo $notif ;} ?>
        </div>
    
   



	
        <script src="script.js"></script>





    <p class="mmm" id="mmm" style="text-align: center"><?php echo $err ?? '';?></p>