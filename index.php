<?php
    
    // SET PAGE SPECIFIC VARIABLES

    // set the root folder (site root not server root) in relation to this page
    $path = "./";       
            // ./ = this page is located in the root directory
            // ../ = this page is located one folder up
            // ../../ = this page is located two folders up, etc.
    
    // every page can have a different title
    $subTitle = "Home";

    // include - site details
    include($path."assets/includes/site_details.php"); 

    // include - header
    include($path."assets/includes/header.php");                        
?>
                <!-- page content goes here &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->
                <article>
                    <div class="right"></div>
                    <table class="standard">

                        <tr>
                            <th>My story</th>
                        </tr>

                        <tr>
                            <td>
                                I am an experienced business analyst with 10+ years of industry experience, wishing to change my career to become a software developer. I have undertaken several web projects using PHP & SQL, and I am currently learning C#.
                                <br>
                                I have been interested in writing code ever since my undergraduate degree, where I took several modules of software development and web development, and (more recently) in my postgraduate degree, where I took modules in web development, and database design.
                            </td>
                        </tr>

                    </table>

                    <table class="DevLogo">

                        <colgroup>
                            <col style="width: 9%;">
                            <col style="width: 15%;">
                            <col style="width: 28%;">
                            <col style="width: 8%;">
                            <col style="width: 8%;">
                            <col style="width: 8%;">
                            <col style="width: 8%;">
                            <col style="width: 8%;">
                            <col style="width: 8%;">
                        </colgroup>

                        <thead>
                            <tr>
                                <th class="DevLogo" colspan="3">Development Skills</th>
                                <th class="DevLogo">0</th>
                                <th class="DevLogo">1</th>
                                <th class="DevLogo">2</th>
                                <th class="DevLogo">3</th>
                                <th class="DevLogo">4</th>
                                <th class="DevLogo">5</th>
                            </tr>
                        </thead>

                        <tbody>


                            <!-- ******************************************************************************** -->
                            <!-- C# -->
                            <tr class="">

                                <td class="DevLogo">
                                    <img class="DevLogo" src="<?php echo $path; ?>assets/images/DevLogos/CSharp.png">
                                </td>

                                <td class="DevLogo">
                                    Currently learning
                                </td>

                                <td class="DevLogo">
                                    1 x completed tutorial, 1 x active tutorial, 2 x current projects (see GIT page for more details)
                                </td>                               

                                <td class="DevLogo"></td>
                                <td class="DevLogo">&#9989;</td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>

                            </tr>

                            <!-- ******************************************************************************** -->
                            <!-- PHP -->
                            <tr class="">

                                <td class="DevLogo">
                                    <img class="DevLogo" src="<?php echo $path; ?>assets/images/DevLogos/PHP.png">      
                                </td>

                                <td class="DevLogo">
                                    Some experience
                                </td>                                  
                                
                                <td class="DevLogo">
                                    this website + 2 university projects + PoC (see Projects page for more info)
                                </td>

                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo">&#9989;</td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>

                            </tr>

                            <!-- ******************************************************************************** -->
                            <!-- SQL -->
                            <tr class="">

                                <td class="DevLogo">
                                    <img class="DevLogo" src="<?php echo $path; ?>assets/images/DevLogos/SQL.png">
                                </td>

                                <td class="DevLogo">
                                    Some experience
                                </td>

                                <td class="DevLogo">                                    
                                    this website + 2 university projects, + experience as a BA + PoC (see Projects page for more info)
                                </td>
                                    
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo">&#9989;</td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>

                            </tr>

                            <!-- ******************************************************************************** -->
                            <!-- WPF -->
                            <tr class="">

                                <td class="DevLogo">
                                    <img class="DevLogo" src="<?php echo $path; ?>assets/images/DevLogos/WPF.png">
                                </td>                            

                                <td class="DevLogo">
                                    Some experience
                                </td>

                                <td class="DevLogo">
                                    no projects to show as yet
                                </td>

                                <td class="DevLogo"></td>
                                <td class="DevLogo">&#9989;</td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>

                            </tr>

                            <!-- ******************************************************************************** -->
                            <!-- HTML -->
                            <tr class="">

                                <td class="DevLogo">
                                    <img class="DevLogo" src="<?php echo $path; ?>assets/images/DevLogos/HTML.png">
                                </td>

                                <td class="DevLogo">
                                    Experienced
                                </td>

                                <td class="DevLogo">                                                              
                                    this website + various other projects (see Projects page for more info)
                                </td>

                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo">&#9989;</td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>

                            </tr>

                            <!-- ******************************************************************************** -->
                            <!-- CSS -->
                            <tr class="">

                                <td class="DevLogo">
                                    <img class="DevLogo" src="<?php echo $path; ?>assets/images/DevLogos/CSS.png">
                                </td>

                                <td class="DevLogo">
                                    Experienced
                                </td>

                                <td class="DevLogo">                                                                   
                                    this website + various other projects (see Projects page for more info)                                
                                </td>

                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo">&#9989;</td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>

                            </tr>

                            <!-- ******************************************************************************** -->
                            <!-- Entity Framework -->
                            <tr class="DevLogo">

                                <td class="DevLogo">
                                    <img class="DevLogo" src="<?php echo $path; ?>assets/images/DevLogos/EntityFramework.png">
                                </td>

                                <td class="DevLogo">
                                    Learning
                                </td>

                                <td class="DevLogo">                                
                                    not yet started                                 
                                </td>

                                <td class="DevLogo">&#9989;</td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>

                            </tr>

                            <!-- ******************************************************************************** -->
                            <!-- .Net -->
                            <tr class="">

                                <td class="DevLogo">
                                    <img class="DevLogo" src="<?php echo $path; ?>assets/images/DevLogos/DotNET.png">
                                </td>

                                <td class="DevLogo">
                                    Currently learning
                                </td>

                                <td class="DevLogo">                                
                                    Learning as I go / alongside coding
                                </td>

                                <td class="DevLogo"></td>
                                <td class="DevLogo">&#9989;</td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>

                            </tr>

                            <!-- ******************************************************************************** -->
                            <!-- GIT -->
                            <tr class="">

                                <td class="DevLogo">
                                    <img class="DevLogo" src="<?php echo $path; ?>assets/images/DevLogos/GIT.png">
                                </td>

                                <td class="DevLogo">
                                    Currently learning
                                </td>

                                <td class="DevLogo">                               
                                    Learning as I go / alongside coding (see GIT page for more details)
                                </td>

                                <td class="DevLogo"></td>
                                <td class="DevLogo">&#9989;</td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>
                                <td class="DevLogo"></td>

                            </tr>

                        </tbody>
                    </table>

                </article>
                <!-- end of content &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& -->

<?php
    //footer include
    include($path."assets/includes/footer.php");
?>
