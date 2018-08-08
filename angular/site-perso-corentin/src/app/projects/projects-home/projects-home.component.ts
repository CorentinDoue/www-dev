import {AfterViewInit, Component, ElementRef, OnInit, QueryList, ViewChild, ViewChildren} from '@angular/core';
import {ROUTE_ANIMATIONS_ELEMENTS, routeAnimations} from '../../core/animations/route.animations';
import {ThemeHoursService} from '../../theme-hours.service';
import {PROJECTS} from '../../../data/projects.data';
import {ActivatedRoute, Router} from '@angular/router';
import {ProjectComponent} from '../project/project.component';

@Component({
  selector: 'spc-projects-home',
  templateUrl: './projects-home.component.html',
  styleUrls: ['./projects-home.component.scss'],
  animations: [routeAnimations]
})
export class ProjectsHomeComponent implements OnInit, AfterViewInit {
  @ViewChild('top') top: ElementRef;
  @ViewChildren('projects') projectElements: QueryList<ProjectComponent>;

  theme;
  routeAnimationsElements = ROUTE_ANIMATIONS_ELEMENTS;
  projects = PROJECTS;
  currentElement: ProjectComponent;
  currentId: string;
  viewInit = false;

  constructor(
    public themeHoursService: ThemeHoursService,
    private route: ActivatedRoute,
    private router: Router,
  ) { }

  ngOnInit() {
    this.top.nativeElement.scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    });
    this.route.fragment.subscribe(fragment => {
      this.open(fragment);
    });
    this.initTheme();
  }

  ngAfterViewInit() {
    this.first_open();
    this.viewInit = true;
  }

  private initTheme() {
    const hours = new Date().getHours();
    this.theme = ((hours >= this.themeHoursService.sunset || hours <= this.themeHoursService.sunrise)
        ? 'blue-night-theme'
        : 'blue-day-theme'
    );
  }

  public open(id: string) {
    let found = false;
    for (let i = 0, len = this.projects.length; i < len; i++) {
      if (this.projects[i].id === id) {
        this.projects[i].open = true;
        this.currentId = id;
        if (this.viewInit) {
          this.currentElement = this.projectElements.toArray()[i];
          setTimeout(() => {
            this.currentElement.top.nativeElement.scrollIntoView({
              behavior: 'smooth',
              block: 'start'
            });
          }, 600);
        }
        found = true;
      } else {
        this.projects[i].open = false;
      }
    }
    this.projects = [...this.projects];
    if (!found && id != null) {
      this.router.navigate(['/404']);
    }
  }

  private first_open() {
    for (let i = 0, len = this.projects.length; i < len; i++) {
      if (this.projects[i].id === this.currentId) {
        this.projects[i].open = true;
        this.currentElement = this.projectElements.toArray()[i];
        setTimeout(() => {
          this.currentElement.top.nativeElement.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }, 600);
      }
    }
  }

}
