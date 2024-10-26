import review from '../fixtures/review.json'

describe('Review overview tests', () => {
    beforeEach(() => {
        cy.clearCookies();
        cy.clearLocalStorage();
        cy.wait(2000)
        cy.visit('/review');
    });

    it('should render the page successfully', () => {
        cy.get('body')
            .should('exist')
            .and('be.visible');
    });

    it('should render the header with correct text', () => {
        cy.get('[data-cypress="header-title"]')
            .should('contain.text', 'Reviews');
    });

    it('should render the header with correct image source', () => {
        cy.get('[data-cypress="header-image"]')
            .should('have.attr', 'src')
            .and('include', 'napoleon-reviews.jpg');
    });

    it('should display multiple review-cards with correct data', () => {
        cy.get('[data-cypress="review-card"]').each((card, index) => {
            const expected = review.review_cards[index];

            cy.wrap(card).find('h3').should('be.visible').and('contain.text', expected.title)
            cy.wrap(card).find('p').eq(0).should('contain.text', `Category: ${expected.category}`)
            cy.wrap(card).find('p').eq(1).should('contain.text', `Verdict: ${expected.verdict}`)
            cy.wrap(card).find('p').eq(2).should('contain.text', expected.description)
            cy.wrap(card).find('a').should('have.attr', 'href', expected.readMoreLink);
        })
    })
});
