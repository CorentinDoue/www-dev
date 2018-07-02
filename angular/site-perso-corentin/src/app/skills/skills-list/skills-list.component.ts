import {Component, Input, OnInit} from '@angular/core';
import {Skill} from '../../../data/skill';


@Component({
  selector: 'spc-skills-list',
  templateUrl: './skills-list.component.html',
  styleUrls: ['./skills-list.component.scss']
})
export class SkillsListComponent implements OnInit {

  ranks = [0, 0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5];
  @Input() skills: Skill[];

  constructor() { }

  ngOnInit() {
  }

}
