import {Component, Input, OnInit} from '@angular/core';
import {Skill} from '../../../data/skill';
import {ROUTE_ANIMATIONS_ELEMENTS} from '../../core/animations/route.animations';
import {animate, style, transition, trigger} from '@angular/animations';


@Component({
  selector: 'spc-skills-list',
  templateUrl: './skills-list.component.html',
  styleUrls: ['./skills-list.component.scss'],
  animations: [
    trigger('skillLearnState', [
      transition(':enter', [
        style({ opacity: 0, height: 0 }),
        animate(200)
      ]),
      transition(':leave', [
        animate(200, style({ opacity: 0, height: 0 }))
      ]),
    ])
  ]
})
export class SkillsListComponent implements OnInit {


  @Input() skills: Skill[];

  routeAnimationsElements = ROUTE_ANIMATIONS_ELEMENTS;

  ngOnInit() {
    this.sortSkills();
  }

  sortSkills() {
    this.skills.sort((a: Skill, b: Skill) => {
      if (a.mark > b.mark) {
        return -1;
      } else if (a.mark < b.mark) {
        return 1;
      } else {
        return 0;
      }
    });
  }
}
