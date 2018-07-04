import {Component, Input, OnInit} from '@angular/core';
import {Skill} from '../../../data/skill';
import {ROUTE_ANIMATIONS_ELEMENTS} from '../../core/animations/route.animations';
import {animate, state, style, transition, trigger} from '@angular/animations';
import {ActivatedRoute} from '@angular/router';


@Component({
  selector: 'spc-web-skills-list',
  templateUrl: './web-skills-list.component.html',
  styleUrls: ['./web-skills-list.component.scss'],
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
export class WebSkillsListComponent implements OnInit {


  @Input() skillsLists;

  routeAnimationsElements = ROUTE_ANIMATIONS_ELEMENTS;

  constructor() {
  }

  ngOnInit() {
  }

}
