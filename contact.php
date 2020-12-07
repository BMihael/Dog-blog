<?php

  require_once 'php/queries/fetch_countries.php';
  require_once 'php/send_message_contact_form.php';

  print'
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22252.125189552386!2d15.957473965953497!3d45.80093045623043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d6f68fa627bb%3A0xebc011844edf0ae7!2sLower%20Town%2C%2010000%2C%20Zagreb!5e0!3m2!1shr!2shr!4v1603876795627!5m2!1shr!2shr" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  <div class="container_around_elements">
  <form id="contact_form" name="contact_form" method="post" action="index.php?menu=3" autocomplete="on">
    <label for="firstName">First name</label>
    <input type="text" id="firstName" name="firstName" placeholder="Your first name..." required>
    <label for="lastName">Last name</label>
    <input type="text" id="lastName" name="lastName" placeholder="Your last name..." required>
    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Your email..." required>
    <label for="country">Country</label>
    <select name="country">';
    while($row = mysqli_fetch_array($result)){
        print'
      <option value="'.$row["name"].'">'. $row["name"].'</option>';
    }
    print'
    </select>
    <label for="subject">Subject</label>
    <textarea name="message" id="message" form="contact_form" placeholder="Enter your message here..." required></textarea>
    <button class="button_submit" type="submit" name="sendMessage">Send message</button>
  </form>
  </div>';
?>