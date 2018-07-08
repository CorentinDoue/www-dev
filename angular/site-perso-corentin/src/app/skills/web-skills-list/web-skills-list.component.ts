import {Component, Input, OnInit, ViewEncapsulation} from '@angular/core';
import {ROUTE_ANIMATIONS_ELEMENTS} from '../../core/animations/route.animations';
import {Skill} from '../../../data/skill';



@Component({
  selector: 'spc-web-skills-list',
  templateUrl: './web-skills-list.component.html',
  styleUrls: ['./web-skills-list.component.scss'],
  encapsulation: ViewEncapsulation.None
})
export class WebSkillsListComponent implements OnInit {


  @Input() skillsLists;
  @Input() selectedIndex;
  sortedList;

  routeAnimationsElements = ROUTE_ANIMATIONS_ELEMENTS;

  constructor() {
  }

  ngOnInit() {
  }
}
