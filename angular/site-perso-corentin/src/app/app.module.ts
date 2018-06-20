import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {SharedModule} from './shared/shared.module';
import {AppRoutingModule} from './app-routing.module';
import { NotFoundComponent } from './not-found/not-found.component';
import { HomeComponent } from './home/home.component';
import {CoreModule} from './core/core.module';


@NgModule({
  declarations: [
    AppComponent,
    NotFoundComponent,
    HomeComponent
  ],
  imports: [
    // angular
    BrowserAnimationsModule,
    BrowserModule,

    // core & shared
    SharedModule,
    CoreModule,

    // app
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
