import { NgModule } from '@angular/core';

import { SkillsRoutingModule } from './skills-routing.module';
import { SkillsHomeComponent } from './skills-home/skills-home.component';
import {SharedModule} from '../shared/shared.module';
import { ProgressBarComponent } from './progress-bar/progress-bar.component';
import { SkillsListComponent } from './skills-list/skills-list.component';
import {WebSkillsListComponent} from './web-skills-list/web-skills-list.component';

@NgModule({
  imports: [
    SharedModule,
    SkillsRoutingModule
  ],
  declarations: [SkillsHomeComponent, ProgressBarComponent, SkillsListComponent, WebSkillsListComponent]
})
export class SkillsModule { }
