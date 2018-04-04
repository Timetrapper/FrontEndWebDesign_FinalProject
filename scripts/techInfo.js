$(document).ready(function () {
  $('#tree').tree({
    uiLibrary: 'bootstrap4',
    dataSource: [{
        text: 'Software Requirements and Recommendations',
        children: [{
          text: 'Operating System',
          children: [{
            text: 'Windows 10'
          }, {
            text: 'IOS'
          }]
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
    width: '100%'
  });
});