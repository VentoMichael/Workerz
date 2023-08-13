// JavaScript code
const filters = [
    {
        btn: document.querySelector('.filter_sort'),
        content: document.querySelector('.filter_sort_content'),
    },
    {
        btn: document.querySelector('.filter_category'),
        content: document.querySelector('.filter_content_category'),
    },
    {
        btn: document.querySelector('.filter_regions'),
        content: document.querySelector('.filter_content_regions'),
    },
];

const toggleFilters = (btn, content) => {
    filters.forEach((filter) => {
        if (filter.btn !== btn) {
            filter.content.classList.add('hidden');
        }
    });
    content.classList.toggle('hidden');
};

filters.forEach((filter) => {
    filter.btn.addEventListener('click', () => {
        toggleFilters(filter.btn, filter.content);
    });
});

const closeFiltersBtn = document.querySelector('.button_filter_mobile');
const openFiltersBtn = document.querySelector('.button_filters_mobile_open');
const dialogContainer = document.querySelector('.dialog-container');
const filterBackground = document.querySelector('.background_blur');

const toggleFiltersMobile = () => {
    dialogContainer.classList.toggle('hidden');
    filterBackground.classList.toggle('hidden');
};

closeFiltersBtn.addEventListener('click', toggleFiltersMobile);
openFiltersBtn.addEventListener('click', toggleFiltersMobile);

const buttonCategory = document.querySelector('.button_filter_category');
const contentCategory = document.querySelector('.content_filter_category');
const chevronCategory = document.querySelector('.chevron_category');

buttonCategory.addEventListener('click', () => {
    contentCategory.classList.toggle('hidden');
    buttonCategory.classList.toggle('border-gray-300');
    buttonCategory.classList.toggle('-mb-px');
    chevronCategory.classList.toggle('-rotate-180');
    chevronCategory.classList.toggle('rotate-0');
});

const buttonFilterRegion = document.querySelector('.filter_region');
const contentFilterRegions = document.querySelector('.content_filter_regions');
const chevronRegion = document.querySelector('.chevron_region');

buttonFilterRegion.addEventListener('click', () => {
    filters.forEach((filter) => {
        if (filter.content !== contentFilterRegions) {
            filter.content.classList.add('hidden');
        }
    });
    contentCategory.classList.add('hidden');
    contentFilterRegions.classList.toggle('hidden');
    buttonFilterRegion.classList.toggle('border-gray-300');
    buttonFilterRegion.classList.toggle('-mb-px');
    chevronRegion.classList.toggle('-rotate-180');
    chevronRegion.classList.toggle('rotate-0');
});
