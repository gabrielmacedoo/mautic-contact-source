![](./Assets/img/server.png)
# Mautic Contact Server (WIP)

Creates API endpoints for receiving contacts from third parties.

Designed for use by performance marketers who enhance/exchange contacts in mass quantities.
Can optionally be used in tandem with it's sibling [Mautic Contact Client](https://github.com/TheDMSGroup/mautic-contact-client).

## Todo
- [ ] Campaigns: A whitelist of campaigns can be selected for the third party to post into.
- [ ] Campaign Limits: Limit the number of contacts accepted to a campaign within defined time frames.
- [ ] Campaign Finance: Track the cost/revenue of contacts upon ingestion per campaign.
- [ ] Campaign Scrub: Support an optional scrub-rate per campaign which affects the cost/revenue.
- [ ] Campaign Required Fields: The fields being used within a campaign should percolate upward to the Server, updating required fields.
- [ ] Self-Documentation: Each server (API) created should auto-generate a public documentation page for a third party. 
- [ ] Notifications: Third parties should be notified when their API changes (such as an added campaign or required field change).

## Installation & Usage

Currently being tested with Mautic `2.12.x`.
If you have success/issues with other versions please report.

1. Install by running `composer require thedmsgroup/mautic-contact-server-bundle`
2. Go to `/s/plugins/reload`
3. After a refresh you will find "Servers" in the main menu, you can dive in and create your first one.

## Uses these fine libraries:

* [Bootstrap Slider](https://github.com/seiyria/bootstrap-slider)
* [JSON Editor](https://github.com/json-editor/json-editor)