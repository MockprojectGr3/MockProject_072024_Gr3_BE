package com.mock.bodyguards.service.impl;

import com.mock.bodyguards.dto.training.BodyguardTrainingResponse;
import com.mock.bodyguards.entity.BodyguardTraining;
//import com.mock.bodyguards.mapper.BodyguardTrainingMapper;
import com.mock.bodyguards.repository.BodyguardTrainingRepository;
import com.mock.bodyguards.service.ITrainingService;
import lombok.RequiredArgsConstructor;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.stream.Collectors;

@Service
@RequiredArgsConstructor
public class TrainingServiceImpl implements ITrainingService {
    private final BodyguardTrainingRepository bodyguardTrainingRepository;
//    private final BodyguardTrainingMapper bodyguardTrainingMapper;

    @Override
    public List<BodyguardTraining> getOngoingTraining(Long bodyguardId) {
        List<BodyguardTraining> trainings = bodyguardTrainingRepository.findByBodyguardId(bodyguardId);
//        return trainings.stream()
//                .map(bodyguardTrainingMapper::toDto)
//                .collect(Collectors.toList());
        return trainings;
    }

    @Override
    public List<BodyguardTraining> getListTraining() {
        return bodyguardTrainingRepository.findAll();
    }


}
