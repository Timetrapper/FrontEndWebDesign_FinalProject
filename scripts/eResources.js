// Provide an organized (by category) of helpful links to online web resources (blogs, technical
//   resources (MDN), etc…) or links to useful free web and software development software (text
//   editors, images editors, etc) that you feel would be helpful to current and future students in the
//   SSD program
//   - Provide a minimum of 8 resources
//   - Optional (but nice to have)
//   o Provide a summary paragraph description of what each link is
//   o A screen shot or logo of the web site

$(document).ready(function () {
  $('#tree').tree({
    uiLibrary: 'bootstrap4',
    dataSource: [{
        text: 'Official Links',
        children: [{
          text: "<a target='_blank' href='https://www.bcit.ca/study/programs/699ccertt'>BCIT SSD Homepage</a>",
        }, {
          text: 'Visual Studio'
        }, {
          text: 'Android Studio'
        }]
      },
      {
        text: 'Computer Requirements and Recommendations',
        children: [{
          text: 'Hard Drive 1TB'
        }, {
          text: '8GB RAM'
        }, {
          text: 'Easy to Carry'
        }]
      },
      {
        text: 'Web Services Requirements',
        children: [{
          text: 'AWS'
        }, {
          text: 'GitHub'
        }, {
          text: 'Mlab'
        }, {
          text: 'Azure'
        }, {
          text: 'HeroKu'
        }]
      },
      {
        text: 'Developer Environment Setup Recommendations / Requirements',
        children: [{
          text: 'Visual Studio Code'
        }, {
          text: 'Visual Studio 2017'
        }, {
          text: 'GitHub Desktop'
        }]
      }
    ],
    width: 500
  });
});