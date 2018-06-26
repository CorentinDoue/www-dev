import { NgModule } from '@angular/core';

import { SkillsRoutingModule } from './skills-routing.module';
import { SkillsHomeComponent } from './skills-home/skills-home.component';
import {SharedModule} from '../shared/shared.module';

@NgModule({
  imports: [
    SharedModule,
    SkillsRoutingModule
  ],
  declarations: [SkillsHomeComponent]
})
export class SkillsModule { }
