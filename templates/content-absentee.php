<?php
global $wp_query;
if (isset($wp_query->query_vars['state_name'])) {
  $state = $wp_query->query_vars['state_name'];
  $state_name = ucwords($state);
} else {
  $state = "";
  $state_name = "";
}

?>
<section class="register-tool">

      <div class="container">
        <iframe src="https://register2.rockthevote.com/registrants/map/?source=iframe&partner=32936" width="100%" height="600" marginheight="0" frameborder="0"></iframe>
      </div><!--.container-->

    </section><!--.register-tool-->

    <section class="voter-registration-guide">
      <div class="container">
        <h1><?php echo $state_name; ?> Voter Registration Guide</h1>
        <div class="updated">Last updated January 16, 2016</div>

        <h3>Voter Registration Deadlines</h3>

        <div class="table">
          <div class="header">Registration Deadline</div>
          <div class="cell">{Registration Deadlines}</div>
        </div>

        <div class="table">
          <div class="header">Election Day Registration</div>
          <div class="cell">{Election Day Registration Information} </div>
          <div class="clear-fix tablet"></div>
        </div><!--.table-->
        
        <h3>Voter Registration Rules</h3>

        <p>Donec sed odio dui vestibulum id ligula porta felis euismod semper:</p>

        <ul>
          <li>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</li>
          <li>Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</li>
          <li>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</li>
          <li>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</li>
          <li>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</li>

        </ul>
        <h3>How to Register to Vote</h3>
        <p>Donec sed odio dui vestibulum id ligula porta felis euismod semper:</p>

        <ul>
          <li>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</li>
          <li>Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</li>
          <li>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</li>
          <li>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</li>
          <li>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</li>

        </ul>

        <h3>Additional Information</h3>
        <p>Nullam quis risus eget urna mollis ornare vel eu leo. Curabitur blandit tempus porttitor. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>

        <div class="table">
          <div class="header">State Election Website</div>
          <div class="cell"><a href="http://www.sos.state.al.us/Elections/Default.aspx" alt="Alabama State Election Website">Alabama State Election Website</a></div>
        </div><!--.table-->

        <div class="table">
          <div class="header">Local Election Officials</div>
          <div class="cell">
              <p>Your Local Election is the best person to contact if you have voting-related questions. They'll be able to provide up to date information on rules and deadlines.</p>
          </div><!--.cell-->
        </div><!--.table-->
      </div><!--.container-->

    </section><!--.voter-registration-guide -->

    <section class="faqs">
      <div class="container">
        <h2>Frequently Asked Questions</h2>

        <div class="faq-box usa-accordion">
          <ul class="usa-unstyled-list">
            <li>
              <button class="question usa-button-unstyled" aria-expanded="false" aria-controls="collapsible-4">
                Do I need to provide ID when I register to vote in Alabama?
              </button>
              <div id="collapsible-4" aria-hidden="true" class="answer usa-accordion-content">
                <p>Nullam quis risus eget urna mollis ornare vel eu leo. Curabitur blandit tempus porttitor. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
              </div>
            </li>
            <li>
              <button class="question usa-button-unstyled" aria-expanded="false" aria-controls="collapsible-5">
                Do I need to provide ID when I vote by absentee ballot in Alabama?
              </button>
              <div id="collapsible-5" aria-hidden="true" class="answer usa-accordion-content">
                <p>All absentee voters must include a copy of their ID with their absentee ballot.  Acceptable forms of voter ID include: Government-issued photo ID; Employee photo ID; Alabama college, university photo ID technical or professional school photo ID; utility bill, bank statement, government paycheck, or paycheck with voter's name and address; Valid ID card (authorized by law) issued by the State of or by any of the other 49 states or issued by the US government; US passport; Alabama hunting or fishing license; Alabama pistol/revolver permit; Valid pilot's license; Valid US military ID; Birth certificate; Social Security card; Naturalization document; Court record of adoption; Court record of name change; Valid Medicaid or Medicare cvard; Valid electronic benefits transfer card; Government document that shows the name and address of the voter.</p>
              </div>
            </li>
            <li>
              <button class="question usa-button-unstyled" aria-expanded="false" aria-controls="collapsible-2">
                Do I need to provide ID when I register to vote in Alabama?
              </button>
              <div id="collapsible-2" aria-hidden="true" class="answer usa-accordion-content">
                <p>Nullam quis risus eget urna mollis ornare vel eu leo. Curabitur blandit tempus porttitor. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
              </div>
            </li>
            <li>
              <button class="question usa-button-unstyled" aria-expanded="false" aria-controls="collapsible-3">
                Do I need to provide ID when I register to vote in Alabama?
              </button>
              <div id="collapsible-3" aria-hidden="true" class="usa-accordion-content">
                <p>Nullam quis risus eget urna mollis ornare vel eu leo. Curabitur blandit tempus porttitor. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
              </div>
            </li>
          </ul><!--.usa-unstyled-list-->
        </div><!--.faq-box- .usa-accordion-->

      </div><!--.container-->

    </section><!--.faqs-->
