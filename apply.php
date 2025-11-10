<!DOCTYPE html>
<html lang="en">
<?php include 'header.inc'; ?>

<body>
    <header class="hero">
        <img src="images/ALIMSON-LOGO.png" alt="Website Logo" class="mini-logo">
        <h1 id="logo">Job Application</h1>
        <p>Form to <strong>apply</strong> for jobs.</p>
    </header>
    <?php include 'nav.inc'; ?>

    <form method="post" action="process_eoi.php" novalidate="novalidate">
    

        <p><label for="jobreferencenumber"> Job Reference Number: </label>
        <select name="jobreferencenumber" id="jobreferencenumber" required>
            <option value="ne1">NE100</option>
            <option value="cs1">CS101</option>
        </select>
        </p>

        <h3> Personal Information </h3>
        <p><label for="firstname"> First name: </label>
            <input type="text" id="firstname" name="firstname" maxlength="20" size="20" required="required" pattern="^[A-Za-z ]{1,20}$" title="Alpha characters only.">
        </p>

        <p><label for="lastname"> Last name: </label>
            <input type="text" id="lastname" name="lastname" maxlength="20" size="20" required="required" pattern="^[A-Za-z ]{1,20}$" title="Alpha characters only">
        </p>

        <p><label for="date"> Date of Birth:  </label>
            <input type="date" name="date" id="date" placeholder="dd-mm-yyyy" required>
        </p>

        <fieldset>
            <legend> Gender </legend>
            <p><label for="male"> Male </label>
                <input type="radio" name="gender" id="male" value="male" required="required"/> 
                <label for="female"> Female </label>
                <input type="radio" name="gender" id="female" value="female"/>
            </p>
        </fieldset>

        <h3> Address </h3>
        <p><label for="streetaddress"> Street Address: </label>
            <input type="text" id="streetaddress" name="street" maxlength="40" size="40" required="required">
        </p>

        <p><label for="suburb"> Suburb/Town: </label>
            <input type="text" id="suburb" name="suburb" maxlength="40" size="40" required="required">
        </p>

        <p><label for="state"> State: </label>
            <select name="state" id="state" required>
                <option value="VIC">VIC</option>
                <option value="NSW">NSW</option>
                <option value="QLD">QLD</option>
                <option value="NT">NT</option>
                <option value="WA">WA</option>
                <option value="SA">SA</option>
                <option value="TAS">TAS</option>
                <option value="ACT">ACT</option>
            </select>
        </p>

        <p><label for="postcode"> Postcode: </label>
            <input type="text" id="postcode" name="postcode" maxlength="4" size="4" pattern="^\d{4}$" required="required">
        </p>

        <h3> Contact </h3>
        <p><label for="email"> Email Address :</label>
            <input type="email" id="email" name="email"  pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Please enter a valid email (e.g., user@example.com)" required="required">
        </p>

        <p><label for="phonenumber"> Phone Number: </label>
            <input type="text" id="phonenumber" name="phonenumber" pattern="^[0-9 ]{8,12}$" title="Phone number must be 8–12 digits (spaces allowed)." required="required">
        </p>

        <h3> Skills </h3>
        <p><label for="requiredtechnical"> Required Technical List: </label><br>
            <label><input type="checkbox" name="req1"> Degree in Cybersecurity/CS/related</label><br>
            <label><input type="checkbox" name="req2"> 3-5 yrs Security Eng/IR/SecOps</label><br>
            <label><input type="checkbox" name="req3"> Knowledge: Firewalls, IDS/IPS, TCP/IP, monitoring</label><br>
            <label><input type="checkbox" name="req4"> Degree in CS/Networking/IT/related</label><br>
            <label><input type="checkbox" name="req5"> 2+ yrs Network Administration</label><br>
            <label><input type="checkbox" name="req6"> Knowledge: Cabling, routers, switches, security tools</label><br>
        </p>

        <p>
            <label>
                <input type="checkbox" name="otherskillsCheckbox"> Other Skills </label>
        </p>

        <p>
            <textarea name="otherskillsText" rows="4" cols="40" placeholder="State your other skills here..."></textarea>
        </p>

        <input type="submit" value="Apply"/>

    </form>

    <?php include 'footer.inc'; ?>
</body>
</html>