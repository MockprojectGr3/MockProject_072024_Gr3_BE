package com.mock.bodyguards.entity;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import java.time.LocalDateTime;

@Entity
@Setter @Getter @AllArgsConstructor @NoArgsConstructor
public class TrainingCatalog extends AbstractBaseEntity{
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private String name;

    private LocalDateTime duration;

    private String description;

    private LocalDateTime startAt;

    private LocalDateTime endAt;
}
