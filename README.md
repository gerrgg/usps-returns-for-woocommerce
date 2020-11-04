# USPS Returns for Woocommerce

Allows customers to easily issue RMA's and generate USPS labels

## Setup

- Build form for non-logged in users to submit {order ID and email to} RMA page.
- Add button to logged-in RMA page which includes link to {order ID, email}.

## Usage

- User provides Order # and Email
- User chooses to return or exchange
- User chooses items to return from order

### Returns

If the user chooses a return

- Calculate refund amount (return shipping - return value).
- Generate USPS label and email to customer.
- Add refund options to Edit Orders (meta) Page.

### Exchanges

If the user chooses to exchange

- Generate a list of equal priced exchange options (variations of the same item).
- Generate USPS label and email to customer.
- Add refund notes to order.
