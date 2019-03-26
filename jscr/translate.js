var createCookie = function(name, value){
    document.cookie = name + "=" + value + ";path=/";
}

function getCookie(c_name) {
    if (document.cookie.length > 0){
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return false;
}

if(getCookie('lang')){
    if (getCookie('lang') == 'GR')
        translateGR();
    else
        translateEN();
} else {
    translateEN();
}

function setText(id,text){
    var v = document.getElementById(id);
    if(v != null)
    {
        v.innerHTML = text;
    }
}
					
function translateEN(){	
	/* Hero Text */
	setText("herotext", "Contact Directory Service");
	setText("herolink", "See More about the service!");
	setText("but", "Get Started");
	setText("or", "or");
    
    /* Nav Bar */
    setText("navhome", "Home");
    setText("navcat", "Directory");
    setText("navcont", "Contact us");
	setText("navhi", "Hello ");
	setText("navlogin", "Log in");
	setText("navlogout", "Log out");
   
	/* Body */
	setText("welcome", "Welcome!");
	setText("storage", "Unlimited Storage Space");
	setText("friendly","User Friendly");
	setText("support", "Excellent Support");
	setText("moreinfo", "Do you have a question?");
	
	setText("colservice", "What?");
	setText("colinstructions", "How?");
	setText("services", "This website offers Contact Directory services.<br>Each user has the ability to:<br>");
	setText("slist1", "Create contacts");
	setText("slist2", "Update or delete existing contacts");
	setText("slist3", "Perform a search in existing contacts");
	setText("instructions", "In order to use the service, you must be logged in to your user account (you can register <a href='php/signup.php'>here</a>).<br>From the 'Directory' option on the menu, you have access to every service described above.<br>You can use the buttons in order to create, edit or delete a contact and the search bar to search a contact's name.");
	
	setText("bottomhelp", "In order to access the service you must log in.<br><br>If you don't have a user account, you can sign up <a href='php/signup.php'>here</a>.<br>You can log in and view your contacts, <a href='php/login.php'>here</a>.");
	
	/* False */
	setText("sorry", "We are sorry :(");
	setText("falsehelp", "In order to gain access, please log in.");
	
	/* Directory */
	setText("cataloguehead", "This is your Directory page.");
	setText("cataloguebody", "Here, you can view your contacts and search for, edit and delete them.<br>");
	setText("newbutton", "Create New Contact");
	setText("searchprompt", "Type the first or last name of the contact you want to search for.");
	
	setText("nocontacts", "You have not created any contacts.");
	setText("editor1", "Delete");
	setText("editor2", "Edit");
	setText("notfound", "No contacts match your search.");
	
	setText("catquestion", "Do you want to delete your account?");

	/* Contact us */
	setText("responsible", "Contact Person");
	setText("contactinfo", "Ilias Chanis<br><br>Tel. 1234567890<br><a href='mailto:iliashanis@gmail.com?Subject=Contact%20Directory' target='_blank'><i style='color: black; font-size: 30px;' class='fa'></i></a> Send us an email<br><a href='https://www.facebook.com/' target='_blank' class='fa fa-facebook'><br></a> Find us on Facebook<br><br>");
	
	/* Signup */
	setText("backbutton", "←  Back");
	
	setText("connerror", "A connection error has occured.<br>Please contact us.<br>Error code: ");
	setText("dberror", "An error in the database has occured.<br>Please contact us.<br>Error code: ");

	setText("sformtitle", "Sign up");
	setText("sformcontents", "Fill in the following form and press Sign up in order to register for our service.<br> Your username must contain only alphanumeric characters. If you make a mistake, press the Cancel button.<br>Fields marked with * are obligatory.<br>Do you already have an account? <a href='login.php'>Log in</a>");
	setText("username", "Username *");
	setText("pass", "Password *");
	setText("passrepeat", "Repeat Password *");
	setText("passshow", "Show Password");
	setText("firstname", "First Name");
	setText("lastname", "Last Name");
	setText("cancel", "Cancel");
	setText("sformsubmit", "Sign up");
	
	/* Login */
	setText("lformtitle", "Log in");
	setText("lformcontents", "Fill the following form to log in.<br>Don't have a user account? <a href='signup.php'>Sign up</a>");
	setText("lusername", "Username");
	setText("lpass", "Password");
    setText("lformsubmit", "Log in");
	
	/* New Contact - Edit */
	setText("newcontacth", "Create New Contact");
	setText("newcontactcon", "Fill the form with the contact information you want to save and press Create Contact. If you make a mistake, press the Cancel button.<br>Fields marked with * are obligatory.");
	setText("cfname", "First Name *");
	setText("ctel", "Telephone");
	setText("conaddress", "Address");
	setText("create", "Create Contact");
	
	setText("edith", "Edit Contact");
	setText("editcon", "After you make any changes you want, click Save Changes to modify your contact. If you make a mistake, press the Cancel button.<br>Fields marked with * are obligatory.");
	setText("savech", "Save Changes");
	
	/* Delete User */
	setText("warning", "Warning! This action cannot be undone.");
	setText("question", "<br>Are you sure you want to delete your acount and all contacts assosciated with it?");
	setText("passprompt", "To confirm the action, please enter your password in the field below and press enter.");
	
    createCookie('lang','ΕΝ');
}
                    
function translateGR(){
     /* Hero Text */
	setText("herotext","Υπηρεσία Καταλόγου");
	setText("herolink","Δείτε περισσότερα για την υπηρεσία!");
	setText("but","Ξεκινήστε");
	setText("or","ή");
    
    /* Nav Bar */
    setText("navhome", "Αρχική");
    setText("navcat", "Κατάλογος");
    setText("navcont", "Επικοινωνία");
	setText("navhi", "Γεια σου ");
	setText("navlogin", "Σύνδεση");
	setText("navlogout", "Αποσύνδεση");
   
	/* Body */
	setText("welcome", "Καλώς ήρθατε!");
	setText("storage", "Απεριόριστος αποθηκευτικός χώρος");
	setText("friendly","Φιλικό προς τον χρήστη");
	setText("support", "Εξαιρετική τεχνική υποστήριξη");
	setText("moreinfo", "Έχετε κάποια ερώτηση;");
	
	setText("colservice", "Τι είναι;");
	setText("colinstructions", "Πως δουλεύει;");
	setText("services", "Η ιστοσελίδα παρέχει υπηρεσίες καταλόγου επαφών.<br>Κάθε χρήστης έχει τη δυνατότητα να:<br>");
	setText("slist1", "Δημιουργήσει επαφές");
	setText("slist2", "Επεξεργαστεί ή διαγράψει τις επαφές του");
	setText("slist3", "Πραγματοποιήσει αναζήτηση στις επαφές του");
	setText("instructions", "Για να χρησιμοποιήσετε την ιστοσελίδα, θα πρέπει να έχετε συνδεθεί στο λογαριασμό σας (μπορείτε να εγγραφείτε πατώντας <a href='php/signup.php'>εδώ</a>).<br>Από τον σύνδεσμο 'Κατάλογος' στο μενού, έχετε πρόσβαση σε όλες τις δυνατότητες που περιγράφονται παραπάνω.<br>Μπορείτε να χρησιμοποιήσετε τα αντίστοιχα κουμπιά για να δημιουργήσετε, επεξεργαστείτε ή διαγράψετε κάποια επαφή και να ανζητήσετε γράφοντας το όνομα της επαφής που αναζητάτε στη μπάρα αναζήτησης.");
	
	setText("bottomhelp", "Για να χρησιμοποιήσετε την υπηρεσία πρέπει να συνδεθείτε.<br><br>Εάν δεν έχετε λογαριασμό χρήστη, μπορείτε να δημιουργήσετε <a href='php/signup.php'>εδώ</a>.<br>Για να συνδεθείτε και να δείτε τις επαφές σας, πατήστε <a href='php/login.php'>εδώ</a>.");
    
	/* False */
	setText("sorry", "Λυπόμαστε :(");
	setText("falsehelp", "Για να αποκτήσετε πρόσβαση, παρακαλούμε συνδεθείτε.");
	
	/* Directory */
	setText("cataloguehead", "Αυτή είναι η σελίδα του καταλόγου σας.");
	setText("cataloguebody", "Εδώ μπορείτε δείτε και να αναζητήσετε τις επαφές σας, καθώς και να προσθέσετε, να τροποποιήσετε ή να διαγράψετε μια επαφή.<br>");
	setText("newbutton", "Δημιουργία Επαφής");
	setText("searchprompt", "Πληκτρολογήστε το όνομα ή το επώνυμο της επαφής που θέλετε να αναζητήσετε.");
	
	setText("nocontacts", "Δεν έχετε καταχωρήσει καμία επαφή.");
	setText("editor1", "Διαγραφή");
	setText("editor2", "Επεξεργασία");
	setText("notfound", "Δεν βρέθηκαν επαφές που ταιριάζουν στην αναζήτησή σας.");
	
	setText("catquestion", "Θέλετε να διαγράψετε το λογαριασμό σας;");
	
	
	/* Contact Us */
	setText("responsible", "Υπεύθυνος επικοινωνίας");
	setText("contactinfo", "Ηλίας Χανής<br><br>Τηλ. 1234567890<br><a href='mailto:iliashanis@gmail.com?Subject=Κατάλογος%20Επαφών' target='_blank'><i style='color: black; font-size: 30px;' class='fa'></i></a> Στείλτε μας email<br><a href='https://www.facebook.com/' target='_blank' class='fa fa-facebook'><br></a> Βρείτε μας στο Facebook<br><br>");
	
	/* Signup */
	setText("backbutton", "←  Πίσω");
	
	setText("connerror", "Υπήρξε κάποιο σφάλμα στη σύνδεση.<br>Παρακαλούμε επικοινωνήστε μαζί μας.<br>Κωδικός σφάλματος: ");
	setText("dberror", "Υπήρξε κάποιο σφάλμα στη βάση δεδομένων.<br>Παρακαλούμε επικοινωνήστε μαζί μας.<br>Κωδικός σφάλματος: ");

	setText("sformtitle", "Εγγραφή");
	setText("sformcontents", "Συμπληρώστε την παρακάτω φορμα και πατήστε στο κουμπί Εγγραφή για να εγγραφείτε και να χρησιμοποιήσετε την υπηρεσία μας.<br>Το όνομα χρήστη πρέπει να περιέχει μόνο λατινικούς χαρακτήρες και αριθμούς. Εάν κάνετε κάποιο λάθος, μπορείτε να πατήσετε στο κουμπί Αναίρεση.<br>Τα πεδία σημειωμένα με * είναι υποχρεωτικά. <br>Έχετε ήδη λογαριασμό χρήστη; <a href='login.php'>Συνδεθείτε</a>");
	setText("username", "Όνομα Χρήστη *");
	setText("pass", "Κωδικός *");
	setText("passrepeat", "Επανάληψη Κωδικού *");
	setText("passshow", "Εμφάνιση Κωδικού");
	setText("firstname", "Όνομα");
	setText("lastname", "Επώνυμο");
	setText("cancel", "Αναίρεση");
	setText("sformsubmit", "Εγγραφή");
	
	/* Login */
	setText("lformtitle", "Σύνδεση");
	setText("lformcontents", "Συμπληρώστε την παρακάτω φορμα για να συνδεθείτε.<br>Δεν έχετε λογαριασμό χρήστη; <a href='signup.php'>Κάντε Εγγραφή</a>");
	setText("lusername", "Όνομα Χρήστη");
	setText("lpass", "Κωδικός");
    setText("lformsubmit", "Σύνδεση");
	
	/* New Contact - Edit */
	setText("newcontacth", "Δημιουργία Νέας Επαφής");
	setText("newcontactcon", "Συμπληρώστε τα στοιχεία της επαφής που θέλετε να αποθηκεύσετε στην παρακάτω φορμα και πατήστε στο κουμπί Δημιουργία για να την αποθηκεύσετε. Εάν κάνετε κάποιο λάθος, μπορείτε να πατήσετε στο κουμπί Αναίρεση.<br>Τα πεδία σημειωμένα με * είναι υποχρεωτικά.");
	setText("cfname", "Όνομα *");
	setText("ctel", "Τηλέφωνο");
	setText("conaddress", "Διεύθυνση");
	setText("create", "Δημιουργία Επαφής");
	
	setText("edith", "Επεξεργασία Επαφής");
	setText("editcon", "Κάντε τις αλλαγές που επιθυμείτε και πατήστε στο κουμπί Αποθήκευση Αλλαγών για να τροποποιήσετε την επαφή σας. Εάν κάνετε κάποιο λάθος, μπορείτε να πατήσετε στο κουμπί Αναίρεση.<br>Τα πεδία σημειωμένα με * είναι υποχρεωτικά.");
	setText("savech", "Αποθήκευση Αλλαγών");
	
	/* Delete User */
	setText("warning", "Προσοχή! Αυτή η ενέργεια δεν μπορεί να αναιρεθεί.");
	setText("question", "<br>Θέλετε σίγουρα να διαγράψετε τον λογαριασμό σας και όλες τις επαφές που έχετε αποθηκεύσει;");
	setText("passprompt", "Για επιβεβαίωση, εισάγετε τον κωδικό σας στο παρακάτω πεδίο και πατήστε enter.");
	
    createCookie('lang','GR');
}
