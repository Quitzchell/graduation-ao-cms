import homepage from '../fixtures/homepage.json'


describe('Home Page Tests', () => {
    beforeEach(() => {
        cy.visit('/', {timeout: 60000});
    });

    it('should render the page successfully', () => {
        cy.get('body')
            .should('exist')
            .and('be.visible');
    });

    it('should render the navigation correctly', () => {
        cy.get('[data-cypress="navigation"]')
            .should('exist')
            .and('be.visible');
    })

    it('should render the header with correct text', () => {
        cy.get('[data-cypress="header-title"]')
            .should('contain.text', "La gloire est éphémère, mais l'oubli est éternel.");
    });

    it('should render the header with correct image source', {retries: 2}, () => {
        cy.get('[data-cypress="header-image"]')
            .should('have.attr', 'src')
            .and('include', 'napoleon-on-horseback.jpg');
    });

    it('should render the About block with correct content', {retries: 2}, () => {
        cy.get('[data-cypress="about-block"]')
            .should('exist')
            .and('be.visible')
            .within(() => {
                cy.get('h3').should('have.text', homepage.about.header);
                cy.get('p').eq(0).should('contain.text', homepage.about.paragraph1);
                cy.get('p').eq(1).should('contain.text', homepage.about.paragraph2);
                cy.get('p').eq(2).should('contain.text', homepage.about.paragraph3);
                cy.get('p').eq(3).should('contain.text', homepage.about.paragraph4).and('contain.text', homepage.about.paragraph5);
            });
    })

    it('should render the Call To Action block with correct content', {retries: 2}, () => {
        cy.get('[data-cypress="call-to-action-block"]')
            .should('exist')
            .and('be.visible')
            .within(() => {
                cy.get('h3').should('contain.text', homepage.cta.header);
                cy.get('p').should('contain.text', homepage.cta.paragraph);
                cy.get('a').should('have.attr', 'href').and('include', homepage.cta.href);
                cy.get('a').should('contain.text', homepage.cta.button_text);
            })
    })

    it('should render Map block with correct content', {retries: 4}, () => {
        cy.get('[data-cypress="map-block"]')
            .should('exist')
            .and('be.visible')
            .within(() => {
                cy.get('h3').should('have.text', homepage.map.header);
                cy.get('p').should('have.text', homepage.map.paragraph);
                cy.get("[data-ntpc='GoogleMapsEmbed'] iframe")
                    .should('exist')
                    .and('have.attr', 'src')
                    .and('include', homepage.map.src);
            });
    })
});
