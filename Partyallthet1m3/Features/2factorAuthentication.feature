Feature: 2 factor authentication

  Scenario: user login verification (2FA)
    Given the user logs in
    Then the user sees 2 options
    Given the user chooses QR code
    Then he scans it with his phone
    And gets redirected to the user home page
    
