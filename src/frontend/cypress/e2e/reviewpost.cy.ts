import reviewPost from '../fixtures/reviewpost.json'

describe("Napoleon's Cinematic Dispatch: Ridley Scott’s Napoleon - Review tests", () => {
    beforeEach(() => {
        cy.clearCookies();
        cy.clearLocalStorage();
        cy.wait(2000)
        cy.visit('/review/napoleons-cinematic-dispatch-ridley-scotts-napoleon');
    });

    it('should render the page successfully', () => {
        cy.get('body')
            .should('exist')
            .and('be.visible');
    });

    it('should render the header with correct text', () => {
        cy.get('[data-cypress="header-title"]')
            .should('contain.text', "Napoleon's Cinematic Dispatch: Ridley Scott’s Napoleon");
    });

    it('should render the header with correct image source', () => {
        cy.get('[data-cypress="header-image"]')
            .should('have.attr', 'src')
            .and('include', 'napoleon-ridley-scott.jpg');
    });

    it('should render the movie information correctly', () => {
        cy.get('[data-cypress="movie-info"]')
            .should('exist')
            .and('be.visible')
            .within(() => {
                cy.get('p').eq(0).should('contain.text', reviewPost.ridley_scott_napoleon.info.title)
                cy.get('p').eq(1).should('contain.text', reviewPost.ridley_scott_napoleon.info.director)
                cy.get('p').eq(2).should('contain.text', reviewPost.ridley_scott_napoleon.info.released)
                cy.get('p').eq(3).should('contain.text', reviewPost.ridley_scott_napoleon.info.leadActors)
            })
    });

    it('should render youtube embed correctly if present', () => {
        cy.get('[data-ntpc="YouTubeEmbed"]')
            .should('be.visible')
            .within(() => {
                cy.get('lite-youtube')
                    .should('have.attr', 'videoid')
                    .and('include', reviewPost['ridley_scott_napoleon'].info.youtube);
            });
    });

    it('should render the paragraphs correctly', () => {
        reviewPost.ridley_scott_napoleon.paragraphs.forEach((section, index) => {
            cy.get('[data-cypress="paragraph-title"]').eq(index)
                .should('have.text', section.title);
            cy.get('[data-cypress="paragraph-text"]').eq(index)
                .should('have.text', section.text);
        })
    });
});

describe('Monsieur N. - Review tests', () => {
    beforeEach(() => {
        cy.clearCookies();
        cy.clearLocalStorage();
        cy.wait(2000)
        cy.visit('/review/napoleons-reflection-a-review-of-monsieur-n');
    });

    it('should render the page successfully', () => {
        cy.get('body')
            .should('exist')
            .and('be.visible');
    });

    it('should render the header with correct text', () => {
        cy.get('[data-cypress="header-title"]')
            .should('contain.text', "Napoleon's Reflection: A Review of Monsieur N.");
    });

    it('should render the header with correct image source', () => {
        cy.get('[data-cypress="header-image"]')
            .should('have.attr', 'src')
            .and('include', 'monsieur-n.webp');
    });

    it('should render the movie information correctly', () => {
        cy.get('[data-cypress="movie-info"]')
            .should('exist')
            .and('be.visible')
            .within(() => {
                cy.get('p').eq(0).should('contain.text', reviewPost.monsieur_n.info.title)
                cy.get('p').eq(1).should('contain.text', reviewPost.monsieur_n.info.director)
                cy.get('p').eq(2).should('contain.text', reviewPost.monsieur_n.info.released)
                cy.get('p').eq(3).should('contain.text', reviewPost.monsieur_n.info.leadActors)
            })
    });

    it('should render the paragraphs correctly', () => {
        reviewPost.monsieur_n.paragraphs.forEach((section, index) => {
            cy.get('[data-cypress="paragraph-title"]').eq(index)
                .should('have.text', section.title);
            cy.get('[data-cypress="paragraph-text"]').eq(index)
                .should('have.text', section.text);
        })
    });
});

describe('Waterloo - Review tests', () => {
    beforeEach(() => {
        cy.clearCookies();
        cy.clearLocalStorage();
        cy.wait(2000)
        cy.visit('/review/napoleons-verdict-a-review-of-waterloo');
    });

    it('should render the page successfully', () => {
        cy.get('body')
            .should('exist')
            .and('be.visible');
    });

    it('should render the header with correct text', () => {
        cy.get('[data-cypress="header-title"]')
            .should('contain.text', "Napoleon's Verdict: A Review of Waterloo");
    });

    it('should render the header with correct image source', () => {
        cy.get('[data-cypress="header-image"]')
            .should('have.attr', 'src')
            .and('include', 'waterloo-review.jpg');
    });

    it('should render the movie information correctly', () => {
        cy.get('[data-cypress="movie-info"]')
            .should('exist')
            .and('be.visible')
            .within(() => {
                cy.get('p').eq(0).should('contain.text', reviewPost.waterloo.info.title)
                cy.get('p').eq(1).should('contain.text', reviewPost.waterloo.info.director)
                cy.get('p').eq(2).should('contain.text', reviewPost.waterloo.info.released)
                cy.get('p').eq(3).should('contain.text', reviewPost.waterloo.info.leadActors)
            })
    });

    it('should render the paragraphs correctly', () => {
        reviewPost.waterloo.paragraphs.forEach((section, index) => {
            cy.get('[data-cypress="paragraph-title"]').eq(index)
                .should('have.text', section.title);
            cy.get('[data-cypress="paragraph-text"]').eq(index)
                .should('have.text', section.text);
        })
    });
});
