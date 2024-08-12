package com.mock.bodyguards.entity;

import jakarta.persistence.*;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import java.time.LocalDateTime;
import java.util.List;

@Entity
@Setter
@Getter
@AllArgsConstructor
@NoArgsConstructor
public class BodyguardTraining extends AbstractBaseEntity{

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private String status;

    private String description;

    private LocalDateTime startDay;

    private LocalDateTime endDay;

    @ManyToOne
    @JoinColumn(name = "bodyguard_id", nullable = false)
    private Bodyguard bodyguard;

    @ManyToOne
    @JoinColumn(name = "trainingCatalog_id", nullable = false)
    private TrainingCatalog trainingCatalog;

    @OneToMany(mappedBy = "bodyguardTraining", cascade = CascadeType.ALL)
    private List<Image> images;

}
