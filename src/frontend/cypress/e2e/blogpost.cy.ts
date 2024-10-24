import blogposts from '../fixtures/blogpost.json'

describe('Battlefield Insights: The Art of Strategy and Tactics in Warfare - Blogpost tests', () => {
    beforeEach(() => {
        cy.visit('blog/battlefield-insights-the-art-of-strategy-and-tactics-in-warfare');
    });

    it('should render the page successfully', () => {
        cy.get('body')
            .should('exist')
            .and('be.visible');
    });

    it('should render the header with correct text', () => {
        cy.get('[data-cypress="header-title"]')
            .should('contain.text', "Battlefield Insights: The Art of Strategy and Tactics in Warfare");
    });

    it('should render the header with correct image source', {retries: 2}, () => {
        cy.get('[data-cypress="header-image"]')
            .should('have.attr', 'src')
            .and('include', 'napoleon-war-advice.webp');
    });

    it('should display the correct paragraphs', () => {
        blogposts.battlefield_insights_strategy_tactics.paragraphs.forEach((section, index) => {
                cy.get('[data-cypress="paragraph-title"]').eq(index)
                    .should('have.text', section.title);
                cy.get('[data-cypress="paragraph-text"]').eq(index)
                    .should('have.text', section.text);
            })
        });

    it('shoud display the correct images', () => {
        blogposts.battlefield_insights_strategy_tactics.images.forEach((section, index) => {
            cy.get('[data-cypress="image-block"]').eq(index)
                .should('have.attr', 'src')
                .and('include', section.src);
        });
    });
});
